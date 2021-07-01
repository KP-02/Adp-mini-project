<?php
$questions_array = $_SESSION['questions_array'];
$names_array = $_SESSION['names_array'];
$number_of_questions = $_SESSION['number_of_questions'];
?>
<!DOCTYPE html>
<html>
<body>
    <script>
        const questionsArray = <?php echo json_encode($questions_array); ?>; //converting a php array to a js array
        const namesArr = <?php echo json_encode($names_array); ?>;
        const numberOfQuestions = parseInt(<?php echo $number_of_questions?>);
        var clickCount = 0;
        let question = document.querySelector('.questions');
        let optionLabels = document.querySelectorAll('label');
        let options = document.querySelectorAll('input[type = "radio"]');
        let ansArr = [];
        document.getElementById('quiz_name').textContent = namesArr.qn;
        document.getElementById('teacher_name').textContent = namesArr.tn;
        let nextBtn = document.getElementById('next-btn');
        window.onload = (update_questions());
        function update_questions() {
        let selected = 0;
            if( clickCount < numberOfQuestions ) {
            question.textContent = questionsArray[clickCount].q; //changing the questions and options on each button click
            optionLabels[0].textContent = questionsArray[clickCount].a;
            optionLabels[1].textContent = questionsArray[clickCount].b;
            optionLabels[2].textContent = questionsArray[clickCount].c;
            optionLabels[3].textContent = questionsArray[clickCount].d;
            }
            for( let i = 0 ; i < 4; i++) {
                if(options[i].checked) {
                    ansArr.push(options[i].value);
                    options[i].checked = false;
                    selected = 1;
                }
            }
            if(selected == 0 && clickCount!=0) {
                ansArr.push("0");
            }
            clickCount++;
            if (clickCount === numberOfQuestions + 1) {
                let important = document.querySelector('#important');
                var ansString = ansArr.join("");
                important.value = ansString;
            }
            console.log(ansArr);
        }
		
		window.onload = (clock());
var flag = 0;
var qns = 1;
document.getElementById("qn_no").innerHTML = "1  / " + numberOfQuestions;
document.getElementById("auto_next").style.visibility = "hidden";
document.getElementById("submit").style.visibility = "hidden";
function clock() {
	var seconds = document.getElementById("countdown").innerHTML = 30;
	var countdown = setInterval(function(){
		seconds--;
		document.getElementById("countdown").innerHTML = seconds;
		if ((seconds < 0 || flag == 1))
		{
			clearInterval(countdown);
			update_questions();
			qns++;
			if(qns <= numberOfQuestions)
			{
				document.getElementById("qn_no").innerHTML = qns + " / " + numberOfQuestions;
			}
			flag = 0;
			document.getElementById("auto_next").click();
			
		}
	}, 1000);
}

function auto_timer() {
	if(qns < numberOfQuestions){
		clock();
	}
	
	else if(qns == numberOfQuestions){
		document.getElementById("next-btn").innerHTML = "Submit";
		clock();
	}
	
	else {
		
		document.getElementById("submit").click();
		document.getElementById("countdown").innerHTML = "0";
	}
}

function next_timer() {
	flag = 1;
}

    </script>
</body>

</html>
