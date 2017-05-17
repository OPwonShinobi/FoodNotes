<?php include("include/header.php"); ?>
<!-- main body will go here, body tags are already distributed to header and footer-->
<link rel="stylesheet" href="/styles/addFood.css"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="script/addfood.js"></script>


<!-- Add 4 categories -->
<div class="container white-text green lighten-1">
	<div class="row">
		<div class="col s12">
			<h5><a href="notes.php" class="white-text"><i class="small material-icons icon-white">arrow_left</i>Cancel</a></h5>
		</div>
		<div class="col s12">
			<h4>Select a food category</h4>
		</div>
	</div>
	<div class="row">
		<div class="col s6 food_group">
				<a href="addMeet.php" class="btn waves-effect waves-light green">
					Meat
				</a>
		</div>
		<div class="col s6 food_group">
				<a href="addFruits.php" class="btn waves-effect waves-light green">
					Fruits
				</a>
		</div>
	</div>
<div class="row">
	<div class="col s6 food_group">
			<a href="addVeggies.php" class="btn waves-effect waves-light green">
				Veggies
			</a>
	</div>
	<div class="col s6 food_group">
			<a class="btn waves-effect waves-light green">
				Dairy
			</a>
	</div>
</div>
<!-- For submitting -->
	<div class="row">
		<div class="col s12 center-align">
			<a id="link_finalize" href="notes.php" class="btn waves-effect waves-light green">Finalize</a>
			</div>
		</div>
<!-- Added items -->
		<div class="row">
			<div class="col s12 center-align">
				<h4>Added items</h4>
			</div>
		</div>
		<ul class="collapsible" data-collapsible="expandable">
			<li>
				<div class="collapsible-header">
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
				<div class="collapsible-body note_body">
						<div class="row">
							<div class="col s4"></div>
							<div class="col s2">0%</div>
							<div class="col s2">50%</div>
							<div class="col s2">100%</div>
							<div class="col s2"><i class="material-icons" style="font-size: 55px">monetization_on</i></div>
						</div>
						<div class="row">
							<div class="col s4">
								<span>Chicken</span>
							</div>
							<div class="col s2"><input id="test1" type="radio" name="group1" checked><label class="largo_svg" for="test1">&nbsp</label></div>
							<div class="col s2"><input id="test2" type="radio" name="group1"><label class="largo_svg" for="test2">&nbsp</label></div>
							<div class="col s2"><input id="test3" type="radio" name="group1"><label class="largo_svg" for="test3">&nbsp</label></div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<span>Ham</span>
							</div>
							<div class="col s2"><input id="test4" type="radio" name="group2" checked><label class="largo_svg" for="test4" >&nbsp</label></div>
							<div class="col s2"><input id="test5" type="radio" name="group2"><label class="largo_svg" for="test5" >&nbsp</label></div>
							<div class="col s2"><input id="test6" type="radio" name="group2"><label class="largo_svg" for="test6" >&nbsp</label></div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
						<div class="row">
							<!-- indented coding style -->
							<div class="col s4">
								<span>Steak</span>
							</div>
							<div class="col s2">
								<input checked id="test7" type="radio" name="group3" checked>
								<label class="largo_svg" for="test7">&nbsp</label></div>
							<div class="col s2">
								<input id="test8" type="radio" name="group3">
								<label class="largo_svg" for="test8">&nbsp</label></div>
							<div class="col s2">
								<input id="test9" type="radio" name="group3">
								<label class="largo_svg" for="test9">&nbsp</label>
								</div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
				</div>
			</li>
			<li>
				<div class="collapsible-header">
					<div class="row">
						<div class="col s2">
							<i class="material-icons" style="font-size: 55px">keyboard_arrow_down</i>
						</div>
						<div class="col s4">
							<span>Fruits</span>
						</div>
						<div class="col s6 alt-right">
							<span class="alt-right" > $ __ </span>
						</div>
					</div>
				</div>
				<div class="collapsible-body note_body">
						<div class="row">
							<div class="col s4"></div>
							<div class="col s2">0%</div>
							<div class="col s2">50%</div>
							<div class="col s2">100%</div>
							<div class="col s2"><i class="material-icons" style="font-size: 55px">monetization_on</i></div>
						</div>
							<!-- 1-line coding style -->
						<div class="row">

							<div class="col s4">
								<span>Apple</span>
							</div>
							<div class="col s2"><input id="test10" type="radio" name="group4" checked><label class="largo_svg" for="test10">&nbsp</label></div>
							<div class="col s2"><input id="test11" type="radio" name="group4"><label class="largo_svg" for="test11">&nbsp</label></div>
							<div class="col s2"><input id="test12" type="radio" name="group4"><label class="largo_svg" for="test12">&nbsp</label></div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
						<div class="row">

							<div class="col s4">
								<span>Orange</span>
							</div>
							<div class="col s2"><input id="test13" type="radio" name="group5" checked><label class="largo_svg" for="test13" >&nbsp</label></div>
							<div class="col s2"><input id="test14" type="radio" name="group5"><label class="largo_svg" for="test14" >&nbsp</label></div>
							<div class="col s2"><input id="test15" type="radio" name="group5"><label class="largo_svg" for="test15" >&nbsp</label></div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
						<div class="row">

							<!-- indented coding style -->
							<div class="col s4">
								<span>Banana</span>
							</div>
							<div class="col s2">
								<input id="test16" type="radio" name="group6" checked><label class="largo_svg" for="test16">&nbsp</label></div>
							<div class="col s2">
								<input id="test17" type="radio" name="group6"><label class="largo_svg" for="test17">&nbsp</label></div>
							<div class="col s3">
								<input id="test18" type="radio" name="group6"><label class="largo_svg" for="test18">&nbsp</label>
								</div>
							<div class="col s1">
								<span>$__ </span>
							</div>
						</div>
				</div>
		    </li>
		    <li>
				<div class="collapsible-header">
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
				<div class="collapsible-body note_body">
						<div class="row">
							<div class="col s4"></div>
							<div class="col s2">0%</div>
							<div class="col s2">50%</div>
							<div class="col s2">100%</div>
							<div class="col s2"><i class="material-icons" style="font-size: 55px">monetization_on</i></div>
						</div>
							<!-- 1-line coding style -->
						<div class="row">

							<div class="col s4">
								<span>Carrot</span>
							</div>
							<div class="col s2"><input id="test19" type="radio" name="group7" checked><label class="largo_svg" for="test19">&nbsp</label></div>
							<div class="col s2"><input id="test20" type="radio" name="group7"><label class="largo_svg" for="test20">&nbsp</label></div>
							<div class="col s2"><input id="test21" type="radio" name="group7"><label class="largo_svg" for="test21">&nbsp</label></div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
						<div class="row">

							<div class="col s4">
								<span>Turnip</span>
							</div>
							<div class="col s2"><input id="test22" type="radio" name="group8" checked><label class="largo_svg" for="test22" >&nbsp</label></div>
							<div class="col s2"><input id="test23" type="radio" name="group8"><label class="largo_svg" for="test23" >&nbsp</label></div>
							<div class="col s2"><input id="test24" type="radio" name="group8"><label class="largo_svg" for="test24" >&nbsp</label></div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
						<div class="row">

							<!-- indented coding style -->
							<div class="col s4">
								<span>Tomato</span>
							</div>
							<div class="col s2">
								<input id="test25" type="radio" name="group9" checked><label class="largo_svg" for="test25">&nbsp</label></div>
							<div class="col s2">
								<input id="test26" type="radio" name="group9"><label class="largo_svg" for="test26">&nbsp</label></div>
							<div class="col s2">
								<input id="test27" type="radio" name="group9"><label class="largo_svg" for="test27">&nbsp</label>
								</div>
							<div class="col s2">
								<span>$__ </span>
							</div>
						</div>
				</div>
	    	</li>
		</ul>
</div>
<?php include("include/footer.php"); ?>
