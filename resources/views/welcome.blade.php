@extends('template.master')
@section('title')
    덕질을 좋아하는 개발자
@endsection

@section('content')
@include('theme.mainOtaku')
    <!-- @if ( !empty($_COOKIE['otaku']) )
        @include('theme.mainOtaku')
    @else
        @include('theme.mainNormal')
    @endif -->
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
