
<html>
    <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>


	<form class="commentForm" method="get" action="">
	    <div>

		<p id="inputs">    
		    <input class="comment" name="name0" />
		</p>

		<input class="submit" type="submit" value="Submit" />
		<!--<input type="button" value="add" id="addInput" />-->

	    </div>
	</form>

	<form action="test_validation.php" method="post">
	    <ul>
		<li>1<input type="checkbox" name="check_list[]" value="value 1"></li>
		<li>2<input type="checkbox" name="check_list[]" value="value 2"></li>
		<li>3<input type="checkbox" name="check_list[]" value="value 3"></li>
		<li>4<input type="checkbox" name="check_list[]" value="value 4"></li>
		<li>5<input type="checkbox" name="check_list[]" value="value 5"></li>
		<ul>
		    <input type="submit" />
		    </form>	
		    <?php
		    if (!empty($_POST['check_list'])) {
			foreach ($_POST['check_list'] as $check) {
			    echo $check . "<br/>";
			}
		    }
		    ?>	



		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		    <script src="http://code.jquery.com/jquery-latest.js"></script>
		    <script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>


		    <script type="text/javascript">
			$(document).ready(function () {
			    var numberIncr = 1; // used to increment the name for the inputs

			    function addInput() {
				$('#inputs').append($('<input class="comment" name="name' + numberIncr + '" />'));
				numberIncr++;
			    }

			    $('form.commentForm').on('submit', function (event) {

				// adding rules for inputs with class 'comment'
				$('input.comment').each(function () {
				    $(this).rules("add",
					    {
						required: true
					    })
				});

				// prevent default submit action         
				event.preventDefault();

				// test if form is valid 
				if ($('form.commentForm').validate().form()) {
				    console.log("validates");
				} else {
				    console.log("does not validate");
				}
			    })

			    // set handler for addInput button click
			    $("#addInput").on('click', addInput);

			    // initialize the validator
			    $('form.commentForm').validate();

			});


		    </script>
		    </body>
		    </html>