@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}
<style>
    .chat-container {
        height: 500px;
        flex-direction: column;
        width: 500px;
        border: 1px solid #ccc;
        margin: 10px auto;
        padding: 20px;
        display: flex;
    }

    #chat-list {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        margin: 5px;
        overflow-y: scroll;
        display: flex;
        flex-direction: column;
    }

    #chat-list div.his {
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

    .side-bar-item {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: black;
        padding: 10px;
        background-color: #ebebeb;

    }

    .side-bar-item img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
</style>
<script src="{{ env('APP_URL') }}/assets/jquery/jquery.3.7.1.js"></script>

<script>
    $(document).ready(function() {
        // Khởi tạo đối tượng Chat, param là hội thoại id lấy từ MYSQL
        var chat = new Chat('{{$conversation_id}}')
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

<div style="position: relative;">
    <div class="side-bar">
        @foreach($conversations as $conversation)
        <div class="list-item">
            <a class="side-bar-item" href="{{$conversation['conversation_id'] != $conversation_id ?  URL::to('/chat/' . $conversation['conversation_id']):"#" }}">
                <img src="{{ asset('assets/backend/img/hoso/'.$conversation['user']?->image) }}" alt="">
                <p>{{ $conversation['user']?->name}}</p>
            </a>
        </div>
        @endforeach
        <a href="/chat">
            Xem tất cả hội thoại
        </a>
    </div>
    <div class="chat-container" style="margin-top: 132px">
        <div id="chat-top">
            <img src="{{ env('APP_URL') }}/assets/backend/img/hoso/{{ $him->image }}" alt="">
            <p>{{$him->name}} - {{$him->getDoanhNghiep->tentiengviet}}</p>
        </div>
        <div id="chat-list"></div>
        <form id="chat-bottom">
            <input type="text" id="input">
            <button type="submit" id="sendBtn">Gửi</button>
        </form>
    </div>
</div>

<script type="module" src="{{ env('APP_URL') }}/assets/frontend/js/chat.js"></script>

@endsection