<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create quiz </title>
</head>
<body>
<br> <br> <br>
<center>
<form action="update_quiz_questions.php" method="POST">
	
	<table border = '1'>
	 <tr> <th colspan='2'> QUIZ DETAILS </th> </tr>
	 <tr> <td> QUIZ NAME : </td> 
		  <td> <input type="text" name="quiz_name" value="" required/> </td>
	 </tr>
	 <tr> <td> AUTHOR NAME : </td>
		  <td> <input type="text" name="author_name" value="" required/> </td>
	 </tr>	  
	</table>
	
<br> <br>
<div id="questions">
<p id="qn1">
	<table border = '1'>
	 <tr> <th> QUESTION 1 </th> <td> <textarea name="textarea1" rows="10" cols="15" value="" required/> </textarea> </td> </tr>
	 <tr> <td> <input type="radio" name="radio1" value="1" required/> OPTION A </td> 
		  <td> <input type="text" name="option_a1" required/> </td>
	 </tr>
	 <tr> <td> <input type="radio" name="radio1" value="2"> OPTION B </td> 
		  <td> <input type="text" name="option_b1" required/> </td>
	 </tr>
	 <tr> <td> <input type="radio" name="radio1" value="3"> OPTION C </td> 
		  <td> <input type="text" name="option_c1" required/> </td>
	 </tr>
	 <tr> <td> <input type="radio" name="radio1" value="4"> OPTION D </td> 
		  <td> <input type="text" name="option_d1" required/> </td>
	 </tr>
	</table> <br> <br> 
</p>
	
</div>
<br> <br> 
<button onclick="add_qn();"> ADD ONE MORE QUESTION </button> 
<br> <br>
<input type="text" id="num_of_qns" name="num_of_qns" value="1" style="display:none">
<button> CREATE </button>
</form>
</body> 
<script type="text/javascript">
var count = 1;
function add_qn() {
	count++;
	var x = "<table border = '1'> <tr> <th> QUESTION " + count + "</th> <td> <textarea name='textarea" + count + "' rows='10' cols='15' value='' required/> </textarea> </td> </tr>";
	x +=  "<tr> <td> <input type='radio' name='radio" + count + "' value='1' required/> OPTION A </td> <td> <input type='text' name='option_a" + count + "' required/> </td> </tr>";
	x +=  "<tr> <td> <input type='radio' name='radio" + count + "' value='2'> OPTION B </td> <td> <input type='text' name='option_b" + count + "' required/> </td> </tr>";
	x +=  "<tr> <td> <input type='radio' name='radio" + count + "' value='3'> OPTION C </td> <td> <input type='text' name='option_c" + count + "' required/> </td> </tr>";
	x +=  "<tr> <td> <input type='radio' name='radio" + count + "' value='4'> OPTION D </td> <td> <input type='text' name='option_d" + count + "' required/> </td> </tr>";
	x +=  "</table> <br> <br>";
	var y = "<p id='qn" + count + "'> </p>";
	document.getElementById('questions').insertAdjacentHTML("beforeend", y);
	document.getElementById("qn"+count).innerHTML = x;
	document.getElementById('num_of_qns').value = count;
}

</script>
</html>
