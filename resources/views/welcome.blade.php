@extends('template.master')
@section('title')
    덕질을 좋아하는 개발자
@endsection

@section('content')
     <section class="first-section">
         <div class="fisrt-content container">
            <div class="main-text font-title">
                Welcome To my AnimeSite
            </div>
            <div class="main-sub-text font-large">
                안녕하세요. <br/>
                애니메이션을 좋아하는 덕후 웹 개발자입니다. <br/>
                심심할때 애니 관련 컨텐츠를 개발하여 올릴 예정입니다.
            </div>
         </div>
     </section>
     <section class="second-section">
        <div class="second-content container">
            <div class="main-text text-c about-main-text">
                ABOUT ME
            </div>
            <div class="about-me-box">
                <div>
                    <img class="about-me-picture" src="/img/my_face.jpg">
                </div>
                <div class="about-me-text">
                    덕후생활10년, 3년차 개발자 겸, 5년차 고양이집사(본업) <br/>
                    취미로 악기연주,영상편집과 가끔씩 그림을 그리고있음. <br/>
                    가장 좋아하는 애니메이션은 케이온 <br/>
                    가장 좋아하는 웹툰은 4컷용사 <br/>
                    가장 좋아하는 일러스트레이터 <a href="https://www.pixiv.net/users/26169943">유콘</a>님 <br/>
                </div>
            </div>
        </div>
     </section>
     <section class="third-section">
         <div class="third-content container">
            <div class="main-text text-c c-white">
                SKILLS
            </div>
            <div class="skills-box">
                <div>
                    <div class="skills-box-text">Front-end</div>
                    <img class="skills-img"src="/img/front.png">
                </div>
                <div>
                    <div class="skills-box-text">Back-end</div>
                    <img class="skills-img"src="/img/backend.png">
                </div>
                <div>
                    <div class="skills-box-text">Deployment</div>
                    <img class="skills-img"src="/img/Deployment.png">
                </div>
            </div>
         </div>
     </section>
     <section class="fourth-section">
         <div class="fourth-content container">
            <div class="main-text text-c c-white">
                PROJECTS
            </div>
            <div class="projects-box bg-white">
                <div class="project-title text-c">애니메이션 초성 취즈</div>

                <div class="project-info">
                    <div class="project-picture">
                        <img class="project-picture-p" src="/img/anime_quiz_screen.png" />
                    </div>
                    <div class="project-text-box">
                        <div class="project-texts">
                            <div>주요기능</div>
                            <div>초성 스피드 퀴즈</div>
                        </div>
                        <div class="project-texts">
                            <div>도메인</div>
                            <div>
                                <a href="http://chinokawai.kr/project/animeQuiz">
                                    http://chinokawai.kr/project/animeQuiz
                                </a>
                            </div>
                        </div>
                        <div class="project-texts">
                            <div>Front-end</div>
                            <div>vanilla.JS, Html, Css</div>
                        </div>
                        <div class="project-texts">
                            <div>Back-end</div>
                            <div>PHP, MariaDB</div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </section>
@endsection

@push('css')
    <style>
        .first-section::before{
            content: "";
            opacity: 0.5;
            top: 0px;
            left: 0px;
            right : 0px;
            bottom: 0px;
            z-index: -2;
            height: 810px;
            position: absolute;
            background-image : url('/img/title.png');
            background-repeat: no-repeat;
            background-size:cover;
            background-position: center;
            background-attachment: fixed;
        }
        .fisrt-content{
            padding: 300px 0;
            text-align: center;
        }
        .main-text{
            font-weight: bold;
            font-size: 3rem;
            margin-bottom: 50px;
        }
        .main-sub-text{
            line-height: auto;
        }
        .second-section{
            padding: 100px 0;
        }
        .about-main-text{
            width: 80%;
            margin: 0 auto;
            padding-bottom: 25px;
            border-bottom: 3px solid #000;
        }
        .about-me-box{
            width: 100%;
            display:flex;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
        }
        .about-me-text{
            font-size: 1.2rem;
            font-weight: bold;
        }
        .about-me-picture{
            width: 100%;
            max-width: 270px;
            margin-right: 90px;
            border-radius: 30px;
        }
        .third-section{
            background-color: #74b9ff;
            padding: 100px;
        }
        .third-main-text{
            text-align: center;
        }
        .skills-box{
            display:flex;
            justify-content: space-evenly;
            width: 100%;
        }
        .skills-box >div{
            width: 27%;
            border-radius: 20px;
            background-color: #f8f8f8;
            text-align: center;
            padding: 30px 30px;
            box-shadow: 10px 12px 16px;
        }
        .skills-box-text{
            font-size: 1.6rem;
            font-weight: bold;
            padding-bottom: 10px;
            border-bottom: 3px solid #74b9ff;
        }
        .skills-img{
            width: 100%;
            margin-top: 20px;
        }
        .fourth-section{
            background-color: #6c5ce7;
        }
        .fourth-content{
            padding: 100px 0;
        }
        .project-title{
            font-size: 1.5rem;
            font-weight: bold;
        }
        .projects-box{
            width: 100%;
            border-radius: 20px;
            padding: 50px 15px;
            box-shadow: 16px 15px 22px;
        }
        .project-info{
            width: 100%;
            display:flex;
            justify-content: space-around;
            align-items: center;
            font-size: 1.2rem;
            margin-top: 50px;
        }
        .project-picture{
            width: 40%;
            text-align: center;
        }
        .project-text-box{
            width: 40%;
        }
        .project-texts{
            display:flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .project-texts > div:first-child{
            width: 30%;
            font-weight: bold;
        }
        .project-texts > div:last-child{
            width: 68%;
        }
        .project-picture-p{
            width: 100%;
            border-radius: 15px;
        }
    </style>
@endpush

@push('scripts')
<script>
    console.log("test")
</script>
@endpush
