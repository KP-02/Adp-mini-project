<?php
$questions_array = $_SESSION['questions_array'];
$names_array = $_SESSION['names_array'];
?>
<!DOCTYPE html>
<html>
<body>
    <script>
        const questionsArray = <?php echo json_encode($questions_array); ?>; //converting a php array to a js array
        const namesArr = <?php echo json_encode($names_array); ?>;
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
            if( clickCount < 5 ) {
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
                }
            
            }
            clickCount++;
            if (clickCount === 6) {
                alert('qns over, click submit');
                let important = document.querySelector('#important');
                var ansString = ansArr.join("");
                important.value = ansString;
            }
        }
    </script>
</body>

</html>