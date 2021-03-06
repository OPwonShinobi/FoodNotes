<?php include("include/header.php"); ?>
<!-- main body will go here, body tags are already distributed to header and footer-->

<link rel="stylesheet" href="/styles/addFood.css"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="script/addfood.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
<script type="text/javascript">
	var config = {
	    apiKey: "AIzaSyBLFamIM2JEo2ESjIEn1PIhbkuKyaXF9Ds",
	    authDomain: "food-notes-test.firebaseapp.com",
	    databaseURL: "https://food-notes-test.firebaseio.com",
	    projectId: "food-notes-test",
	    storageBucket: "food-notes-test.appspot.com",
	    messagingSenderId: "106608811518"
	  };
	  firebase.initializeApp(config);

	const database = firebase.database();
	const users = database.ref("users");

	firebase.auth().onAuthStateChanged(function(user) {
	  if (user != null) {
	    console.log("logged in");
	    findTemp();
	  } else {
	    console.log("not logged in");
		// alert("You're not logged in you hacker! Go home!");
		// location.replace("index.php");
	  }
	});

	function addFood(foodCategory){
		//quincy add ur PHP stuff here
		var FOODS_FROM_POST_OR_SESSION = null;
		var userNode = users.child(user.uid);

		// filters out just the cycle nodes, leaves out email and other junk
		userNode.orderByChild("cycle").equalTo(true).once("value", function(snap){
		// may add date checker, but for now, just add to last cycle
			var count = snap.val().cycleCount - 1;
			var cycleIndex = "cycle" + count;
			var currentUserNode = userNode.child(cycleIndex);

			// access all child, cause its hard to do "SELECT" clause here
			currentUserNode.on("value", function(childSnap){
				var FOODS_FROM_PHP_AS_JSON = {
					/*
					FOODS_FROM_POST_OR_SESSION[0].name : FOODS_FROM_POST_OR_SESSION[0].values
					...
					*/
				}

				currentUserNode.child(foodCategory).update({
					FOODS_FROM_PHP_AS_JSON
				})
			});
		});
	}

	function findTemp(){
		var user = firebase.auth().currentUser;
		var userNode = users.child(user.uid);
		
		userNode.on("child_added", function(snap){
		if (snap.key == "temp")
			populateTempList("fruits", userNode.child("temp"));
		});
	}

	function populateTempList(foodCategory, tempCycleRef) {
		tempCycleRef.on("value", function(snap){
			var snapData = snap.val();
			var fruits = tempCycleRef.child(foodCategory);
			fruits.on("child_added", function(childSnap){
				var childSnapData = childSnap.val();
				var foodName = childSnapData.foodName;
				var price = childSnapData.price;
				console.log(childSnapData.foodName);

				$("#anchor_head_fruit").append(
					'<div class="row">' +
						'<div class="col s8">' +
							'<span>' + foodName + '</span>' +
						'</div>' +
						'<div class="col s4">' +
							'<span>' + price + '</span>' +
						'</div>' +
					'</div>	'
				);
			});
		});
	}

	function finalize() {
		addCycle();
		ctrl_x_temp();
		location.replace("notes.php");
		
		// var user = firebase.auth().currentUser;
		// var userNode = users.child(user.uid);
		// var lastCycle = getLastCycle(userNode);
		// lastCycle.update({"cycle" : true});
	}

	// function ctrl_x_temp() {
	// 	var user = firebase.auth().currentUser;
	// 	var userNode = users.child(user.uid);
	// 	var lastCycle = getLastCycle(userNode);
		
	// 	// var t = 
	// 	userNode.on("value", function(){
	// 		var tempCycleRef = userNode.child("temp");

	// 		tempCycleRef.on("child_added", function(snap){
				
	// 			tempCycleRef.remove();
	// 			lastCycle.set(snap.val());	
	// 			});
	// 		});
	// }
	var tempNode;
	var lastCycle;
	function ctrl_x_temp() {
		var user = firebase.auth().currentUser;
		var userNode = users.child(user.uid);
		lastCycle = getLastCycle(userNode);
		tempNode = database.ref("users/"+user.uid+"/temp");

		tempNode.on("value", copyMe);
		tempNode.off("value", copyMe);
		tempNode.remove();
	}

	function copyMe(snap){
		lastCycle.set(snap.val());
	}
	function getLastCycle(userNode) {
		// var count = userNode.cycleCount - 1;
		var count;  
		userNode.once("value", function(snap){
			console.log("inner cycleIndex: " + snap.val().cycleCount);
			count = snap.val().cycleCount;
		});	
		var cycleIndex = "cycle" + count;
		console.log("outter cycleIndex: " + count);
		return userNode.child(cycleIndex);
	}

	function addCycle() {
		var user = firebase.auth().currentUser;
		var userNode = users.child(user.uid);

		userNode.once("value", function(snap){
			var count = snap.val().cycleCount;
			var cycleIndex = "cycle" + count;
			count++;
			userNode.child("cycleCount").set(count);
			// userNode.child(cycleIndex).update({
			// 	// "cycle" : true,
			// 	"fruits" : "placeholder",
			// 	"vegetables" : "placeholder",
			// 	"meats" : "placeholder"
			// });
		});
	}
</script>
<!-- Add 4 categories -->
<div class="container white-text green lighten-1">
	<div class="row">
		<!-- For cancelling purchase -->
		<div class="col s6 left-align">
			<a href="notes.php" class="btn waves-effect waves-light green">Cancel</a>
		</div>
		<!-- For submitting -->
		<div class="col s6 right-align">
			<!-- <a id="link_finalize" href="notes.php" class="btn waves-effect waves-light green">Finalize</a> -->
			<a id="link_finalize" onclick="finalize()" class="btn waves-effect waves-light green">Finalize</a>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<h4>Select a food category</h4>
		</div>
	</div>
	<div class="row">
		<div class="col s6 food_group ">
			<a href="addMeat.php" class="btn waves-effect waves-light red accent-4">
				Meat
			</a>
		</div>
		<div class="col s6 food_group">
			<a href="addFruits.php" class="btn waves-effect waves-light orange accent-4">
				Fruits
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col s6 food_group">
			<a href="addVeggies.php" class="btn waves-effect waves-light light-green accent-4">
				Veggies
			</a>
		</div>
		<div class="col s6 food_group">
			<a class="btn waves-effect waves-light yellow accent-4">
				Dairy
			</a>
		</div>
	</div>
	<!-- Added items -->
	<div class="row">
		<div class="col s12 center-align">
			<h4>Added items</h4>
		</div>
	</div>
	<ul class="collapsible" data-collapsible="expandable">
		<li class="red accent-4">
			<div class="collapsible-header red accent-4">
				<div class="row">
					<div class="col s2">
						<i class="material-icons" style="font-size: 55px">keyboard_arrow_down</i>
					</div>
					<div class="col s4">
						<span>Meat</span>
					</div>
					<div class="col s6 alt-right">
						<span class="alt-right" > $ __ </span>
					</div>
				</div>
			</div>
			<div class="collapsible-body note_body center-align">
                <?php
                    if (isset($_SESSION['OnOffHolder']) && !is_null($_SESSION['OnOffHolder'][0])) {
                        $counter = 0;
                        foreach($_SESSION['OnOffHolder'] as $nameMe) {
                        foreach($_SESSION['storeMyPrices'] as $nameTwo) {
                            if(strcmp($nameMe, $nameTwo) == 0) {
                            echo
                            '<div class="row"><div class="col s8"><span>' . $nameMe . '</span>
                                </div>
                                <div class="col s4">
                                    <span>' ."$". $_SESSION['storeMyValues'][$counter] . '</span>
                                </div>
                            </div>';
                        }
                        $counter = $counter + 1;
                        }
                        $counter = 0;
                    }
                }
                ?>
				</div>
		</li>
		<li class="orange accent-4">
			<div class="collapsible-header orange accent-4">
				<div class="row">
					<div class="col s2">
						<i class="material-icons" style="font-size: 55px">keyboard_arrow_down</i>
					</div>
					<div class="col s4">
						<span>Fruit</span>
					</div>
					<div class="col s6 alt-right">
						<span class="alt-right" > $ __ </span>
					</div>
				</div>
			</div>
			<div class="collapsible-body note_body center-align" id="anchor_head_fruit">
			</div>
		</li>
		<li class="light-green accent-4">
			<div class="collapsible-header light-green accent-4">
				<div class="row">
					<div class="col s2">
						<i class="material-icons" style="font-size: 55px">keyboard_arrow_down</i>
					</div>
					<div class="col s4">
						<span>Veggies</span>
					</div>
					<div class="col s6 alt-right">
						<span class="alt-right" > $ __ </span>
					</div>
				</div>
			</div>
			<div class="collapsible-body note_body center-align">
				<div class="row">
					<div class="col s8">
						<span>Asparagus</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Broccoli</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Eggplant</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
			</div>
		</li>
		<li class="yellow accent-4">
			<div class="collapsible-header yellow accent-4">
				<div class="row">
					<div class="col s2">
						<i class="material-icons" style="font-size: 55px">keyboard_arrow_down</i>
					</div>
					<div class="col s4">
						<span>Dairy</span>
					</div>
					<div class="col s6 alt-right">
						<span class="right-align" > $ __ </span>
					</div>
				</div>
			</div>
			<div class="collapsible-body note_body center-align">
				<div class="row">
					<div class="col s8">
						<span >Milk</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Eggs</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Cheese</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
			</div>
		</li>
	</ul>
</div>
<?php include("include/footer.php"); ?>
