@extends('template.projectPage')

@section('title')
    뭐만들까
@endsection

@push('css')
    <style>
        .animation-check-container{

        }
        .animation-check-top-wrapper{
            width: 100%;
            height: 50px;
            background-color: #6c5ce7;
        }
        .animation-check-bottom-wrapper{
            position: absolute;
            bottom: 0px;
            width: 100%;
            height: 50px;
            background-color: #6c5ce7;
        }
    </style>
@endpush
@section('content')
    <div class="animation-check-container" id="listObj">
        <div class="animation-check-top-wrapper"></div>
        <div>
            <div>뭘만들까 {{ $result_test }}</div>
            <input type="text" v-model="searchVal"/>
            <button type="button" @click="site_ani_search">검색</button>

            <div v-if="searchList.length > 0">
                <div v-for="items in searchList">
                    @{{ items }}
                </div>
            </div>
        </div>
        <div class="animation-check-bottom-wrapper">bottom</div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        const mainObj = new Vue({
            el : '#listObj',
            data : {
                searchVal: "",
                searchList : {},
            },
            methods : {
                site_ani_search : async function(){
                    const url = "/project/checkAni/search";
                    const requsetData = {
                        aniSearchVal : this.searchVal
                    };
                    const httpResult = await axios.get(url, {params: requsetData});
                    const {status, data , msg} = httpResult;
                    if(status !== 200){
                        alert(msg || msg);
                        return false;
                    }

                    this.searchList = data.list;
                }
            },
            mounted : function(){
                console.log("test");
            }
        })
    </script>
@endpush
