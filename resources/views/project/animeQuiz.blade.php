<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=deivce-width, initial-scale=1.0">
    <link rel="stylesheet" href="base.css" />    
</head>
<style>
    .container{
        max-width: 900px;
        margin: 0 auto;
        height: 100vh;
    }
    .quiz-wrap{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100%;
    }
    .quiz-header{
        width: 100%;
        background-color: #0D338B;
        color: #fff;
        text-align: center;
        font-size: 1.3rem;
        font-weight: bold;
        padding: 20px 0;
        position: fixed;
        top: 0;
    }
    .quiz-text{
        font-size: 2rem;
        font-weight: bold;
        margin: 20px 0;
    }
    .typing-insert{
        width: 75%;
        padding: 10px;
        font-size: 1.2rem;
        margin-bottom: 30px;
    }
    .time-and-cost{
        display: flex;
        font-size: 1.3rem;        
    }
    .time-and-cost > div:first-child{
        margin-right: 20px;
    }
    .time-and-cost > div span{
        font-size: 2.3rem;        
    }
    .game-start-btn{
        cursor: pointer;
        font-size: 1.3rem;
        background-color: #0D338B;
        width: 30%;
        color: #fff;
        padding: 5px 0;
        margin-top: 50px;      
    }
    .game-start-btn.active{
        cursor: not-allowed;
        font-size: 1.3rem;
        background-color: #ccc;
        width: 30%;
        color: #000;
        padding: 5px 0;
        margin-top: 50px;           
    }
</style>
<body>
    <section id="main">
        <div class="container">
            <div class="quiz-wrap">
                <div class="quiz-header">
                    OTAKU TEST
                </div>
                <div class="quiz-text" id="quizText" data-val="새벽의 연화">
                    당신의 씹덕력은 몇점일까요
                </div>      

                <input type="text" class="typing-insert" id="typingInsert" autocomplete="off"/> 

                <div class="time-and-cost">
                    <div class="time">
                        남은시간: <span id="timeCount">10</span>초
                    </div>
                    <div class="cost">
                        획득점수: <span id="score">0</span>점
                    </div>
                </div>
                <button type="button" id="gameStartBtn" class="game-start-btn" >게임시작</button>
            </div>
        </div>
    </section>
</body>
<script>
    const gameStartBtn = document.querySelector("#gameStartBtn");
    const quizText = document.querySelector("#quizText");
    const timeCount = document.querySelector("#timeCount");
    const score = document.querySelector("#score");
    const typingInsert = document.querySelector("#typingInsert");
    const gameTime = 10;
    const quizArray = [
        {question : "ㅅㅂㅇ ㅇㅎ", answer : "새벽의 연화"},
        {question : "ㅈㄱㅇ ㅅㄴ", answer : "작안의 샤나"},
        {question : "ㄱㅇㅁ ㅇㄷㅅ! ㅇㅁㄹㅉ", answer : "건어물 여동생! 우마루짱"},
        {question : "ㄴㅅㅋㅇ", answer : "니세코이"},
        {question : "ㄹㄱ ㅎㄹㅇㅈ", answer : "로그 호라이즌"},
        {question : "ㄹㅈ ㅁㅇㄷ", answer : "로젠 메이든"},
        {question : "ㄱㄴㅂㅇ ㅅㅇ", answer : "가난뱅이 신이"},
        {question : "ㅊㅇㄷㅍ ㄱㄹㄹㄱ", answer : "천원돌파 그렌라간"},
        {question : "ㅁㅂㅅㄴ ㅁㄷㅋ ㅁㄱㅋ", answer : "마법소녀 마도카 마기카"},
        {question : "ㅇㄹㄴ ㅅㅌㅎㅅㄴㄷ", answer : "인류는 쇠퇴했습니다"},
        {question : "ㄴㅇㄱ ㄷㄱㄹ", answer : "너에게 닿기를"},
        {question : "ㄷㅂㅊㅅ", answer : "달빛천사"},
        {question : "ㅅㄷㅇㅌㅇㄹㅇ", answer : "소드아트온라인"},
        {question : "ㅇㅅㄱ ㄹㅂㅇㅈ", answer : "이세계 리뷰어즈"},
        {question : "ㄱㄱㅅㄴㄴ ㅅㅊㅂㅈ ㅇㅇ", answer : "기교소녀는 상처받지 않아"},
        {question : "ㄷㅋㄱㅇ", answer : "도쿄구울"},
        {question : "ㅇ ㅁㅈ ㅅㄱㅇ ㅊㅂㅇ", answer : "이 멋진 세계에 축복을"},
        {question : "4ㅇㅇ ㄴㅇ ㄱㅈㅁ", answer : "4월은 너의 거짓말"},
        {question : "ㄴㅊㅁ ㅇㅇㅈ", answer : "나츠메 우인장"},
        {question : "ㅋㅅㅅㅅㅋㅅ", answer : "키스시스키스"},
        {question : "ㄱㅁㅇ ㅋㄴ", answer : "귀멸의 칼날"},
        {question : "ㅇㅇ", answer : "아인"},
        {question : "ㅂㅍ ㅇㅅ ㅅㄱㄷ", answer : "방패 용사 성공담"},
        {question : "ㄱㅂ", answer : "귀부"},
        {question : "ㄴ ㄴㅅㅇ ㅅㅌㅈㄱ ㅎㅇ ㄹㅂ ㅋㅁㄷㄹ ㅈㄹㅇㄹ ㅂㅎㅎㄱ ㅇㄷ", answer : "내 뇌속의 선택지가 학원 러브 코미디를 전력으로 방해하고 있다"},
        {question : "ㅅㅌㄹㅇㅋ ㄷ ㅂㄹㄷ", answer : "스트라이크 더 블러드"},
        {question : "ㄴㄱㅇ ㄴㄹㅇㅍ", answer : "노게임 노라이프"},
        {question : "ㅇㄱㅂㄷ", answer : "야근병동"},
        {question : "ㅇㅍㄱ ㅅㅇㅎㅁㄹ ㅂㅇㄹㅇ ㅇㅇㅎㄴㄷ", answer : "니세코이"},
        {question : "ㅋㄹㅋ", answer : "킬라킬"},
    ]

    let time = gameTime;
    let is_game = false;
    let scoreVal =0;
    let timeInterval;

    const btnChange = () =>{
        let btnStatus = gameStartBtn.classList.contains("active");
        if(btnStatus){
            gameStartBtn.classList.remove("active");            
        }else{
            gameStartBtn.classList.add("active");
            gameStartBtn.innerText = "게임중";
            gameStartBtn.removeEventListener("click",run);
        }
    }
    const countDown = ()=>{
        time > 1 ? time-- : is_game = false;
        timeCount.innerText = time;
        if(!is_game){            
            clearInterval(timeInterval);
            timeCount.innerText = 0;
            gameStartBtn.classList.remove("active");
            gameStartBtn.innerText = "게임시작";
            gameStartBtn.addEventListener("click",run);
            alert("종료 \n정답 : "+quizText.dataset.val);        
        }
    }

    const makeQuiz = () =>{
        const wordRandomIndex = Math.floor(Math.random() * quizArray.length);
        quizText.innerText = quizArray[wordRandomIndex].question;
        console.log(quizArray[wordRandomIndex].question);
        quizText.dataset.val = quizArray[wordRandomIndex].answer;
    }

    const run = () =>{        
        is_game = true;
        time = gameTime;
        timeCount.innerText = time;
        scoreVal = 0;
        score.innerText = scoreVal;
        typingInsert.value = "";
        typingInsert.focus();
        timeInterval = setInterval(countDown,1000);
        btnChange();
        makeQuiz();

    }

    const wordMatch = (e) =>{        
        if(is_game && e.key === "Enter"){
            if(typingInsert.value === quizText.dataset.val){
                typingInsert.value = "";
                scoreVal++;
                score.innerText = scoreVal;                                
                time = gameTime;
                timeCount.innerText = time;
                makeQuiz();
            }
        }
    }

    gameStartBtn.addEventListener("click",run);
    typingInsert.addEventListener("keydown",wordMatch);

</script>