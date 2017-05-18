<?php include("include/header.php"); ?>
<!-- main body will go here, body tags are already distributed to header and footer-->
<link rel="stylesheet" href="/styles/addFood.css"/>
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
	    start();
	  } else {
	    console.log("not logged in");
	    // TODO: before pushing to gitHub, uncomment below:
		// alert("You're not logged in you hacker! Go home!");
		// location.replace("index.php");
	  }
	});

	function start() {
		var user = firebase.auth().currentUser;
		var userNode = users.child(user.uid);
		
		userNode.once("value", function(snap){
			var count = snap.val().cycleCount;
			var cycleIndex = "cycle".concat(String(count));
			userNode.child("cycleCount").set(++count);
			userNode.child(cycleIndex).update({
					"cycle" : true,
					"fruits" : "placeholder",
					"vegetables" : "placeholder",
					"meats" : "placeholder"
			});
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
			<a href="notes.php" class="btn waves-effect waves-light green">Finalize</a>
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
				<div class="row">
					<div class="col s8">
						<span>Chicken</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Ham</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Steak</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
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
			<div class="collapsible-body note_body center-align">
				<div class="row">
					<div class="col s8">
						<span>Peach</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Banana</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						<span>Apple</span>
					</div>
					<div class="col s4">
						<span>$__ </span>
					</div>
				</div>
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
