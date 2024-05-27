@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<style>
    .chat-container {
        height: 500px;
        flex-direction: column;
        border: 1px solid #ccc;
        margin: 10px auto;
        padding: 20px;
        display: flex;
    }

    #chat-list {
        height: 500px;
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 5px;
        overflow-y: scroll;
        display: flex;
        flex-direction: column;
    }

    #chat-list div.him {
        text-align: left;
        background-color: #f1f0f0;
        padding: 10px;
        border-radius: 6px;
        margin: 5px;
        max-width: 70%;
        width: fit-content;
    }

    #chat-list div.me {
        text-align: right;
        background-color: #007bff;
        color: white;
        padding: 10px;
        border-radius: 6px;
        margin: 5px;
        max-width: 70%;
        width: fit-content;
        align-self: flex-end;
    }

    #chat-top {
        text-align: center;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    #chat-top img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    #chat-top p {
        font-weight: 600;
        font-size: 18px;
    }

    #chat-bottom {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        margin-top: 12px;
    }

    #chat-bottom input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-top: auto;
    }

    #chat-bottom #sendBtn {
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        border: none;

    }

    .side-bar {
        width: 200px;
        height: 100%;
        border: 1px solid #ccc;
        display: flex;
        flex-direction: column;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        background-color: white;
    }
    .side-bar-item-right,
    .side-bar-item {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: black;
        padding: 12px;
        background-color: #ebebeb;
        padding-left: 24px
    }
    .side-bar-item-right{
        display: block;
        text-align: center;
    }

    .side-bar-item:hover {
        background-color: #ccc;
    }
    .side-bar-item:hover span{
        color: #000;
    }
    .side-bar-item-right img {
        margin-top: 20px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }
    .side-bar-item img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    .all__chat {
        display: flex;
        background-color: #000;
        padding:12px;
        justify-content:center;
        position:absolute;
        top:91%;
        width:100%;
        cursor: pointer;
        transition: .3s;
    }

    .all__chat a {
        color: #fff;
        font-weight:600;
        transition: .3s;
    }

    .all__chat:hover {
        background-color: #007bff;
    }
    .all__chat:hover a{
        color: #000;
    }
</style>
<script src="{{ env('APP_URL') }}/assets/jquery/jquery.3.7.1.js"></script>

<script>
    $(document).ready(function() {
        // Khởi tạo đối tượng Chat, param là hội thoại id lấy từ MYSQL
        var chat = new Chat('{{$conversation_id}}', '{{env("FIREBASE_MESSAGE_TABLE_NAME")}}')
        // lắng nghe thay đổi trong danh sách tin nhắn
        chat.loadMessages((messages) => {
            $('#chat-list').html('')
            messages.forEach(message => {
                let className = message.user_id == Number("{{Auth::user()->id}}") ? 'me' : 'him'
                $('#chat-list').append(`<div class="${className}">${message.message}</div>`)
            })
            $('#chat-list').scrollTop($('#chat-list')[0].scrollHeight)
        })

        $('#chat-bottom').on('submit', async function(e) {
            e.preventDefault()
            let message = $('#input').val().trim()
            if (message == '') {
                return
            }
            $('#input').val('')
            await chat.sendMessage(Number("{{Auth::user()->id}}"), message)
        })
    })
</script>

<div style="position: relative">
    <div class="container-fluid" style="margin-top: 126px">
        <div class="row">
            <div class="col-3" style="background: #ebebeb;padding:0;position: relative">
                <h5 class="text-uppercase d-flex" style="color: blue;font-weight:700;border-bottom:1px solid #000;justify-content:center;align-items:center;padding:16px;margin:0">Các đoạn hội thoại</h5>
                @foreach($conversations as $conversation)
                <div class="list-item">
                    <a class="side-bar-item" href="{{$conversation['conversation_id'] != $conversation_id ?  URL::to('/chat/' . $conversation['conversation_id']):"#" }}">
                        <img src="{{ asset('assets/backend/img/hoso/'.$conversation['user']?->image) }}" alt="">
                        <span title="{{ $conversation['user']?->name}}" class="d-flex" style="justify-content:center;align-items:center;font-weight:600">{{$him->getDoanhNghiep->tentiengviet}}</span>
                    </a>
                </div>
                @endforeach
                <div class="all__chat">
                    <a href="/chat" style="" class="d-flex text-decoration-none text-uppercase">
                        Xem tất cả hội thoại
                    </a>
                </div>
            </div>
            <div class="col-6">
                <div class="chat-container">
                    <div id="chat-top" class="d-flex">
                        <img src="{{ env('APP_URL') }}/assets/backend/img/hoso/{{ $him->image }}" alt="">
                        <span class="d-flex text-uppercase" style="align-items:center;font-weight:700">{{$him->name}}</span>
                    </div>
                    <div id="chat-list"></div>
                    <form id="chat-bottom">
                        <input type="text" id="input">
                        <button type="submit" id="sendBtn">Gửi</button>
                    </form>
                </div>
            </div>
            <div class="col-3" style="background: #ebebeb">
                <div class="side-bar-item-right" style="justify-content: center">
                    <h5 class="text-uppercase d-flex" style="color: blue;font-weight:700;border-bottom:1px solid #000;justify-content:center;align-items:center;padding:16px;margin:0">Thông tin hội thoại</h5>
                    <img style="" src="{{ asset('assets/backend/img/hoso/'.$conversation['user']?->image) }}" alt="">
                    <span class="text-uppercase" style="display:block;margin-top:16px;font-weight:600;font-size:18px;color:#007bff">{{$him->getDoanhNghiep->tentiengviet}}</span>
                    <span class="" style="display:block;margin-top:8px">Đại diện : <span style="text-transform: uppercase;font-weight:600">{{ $conversation['user']?->name}}</span></span>
                    <span class="" style="display:block;margin-top:8px">Lĩnh vực : <span style="text-transform: uppercase;font-weight:600">{{$him->getDoanhNghiep->getlinhvuc->tenlinhvuc}}</span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="{{ env('APP_URL') }}/assets/frontend/js/chat.js"></script>

@endsection