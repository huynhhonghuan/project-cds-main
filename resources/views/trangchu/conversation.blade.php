@extends('trangchu.layout'){{--kế thừa từ layout--}}
@section('content'){{--nhúng nội dung content vào layout--}}


<style>
    .conversation-container {
        width: 700px;
        margin: 100px auto 100px;
    }

    .list-item {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin: 5px;
        text-decoration: none;
        color: black;
    }

    .list-item a {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: black;
        flex: 1
    }

    .list-item img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .list-item p {
        font-weight: 500;
        font-size: 18px;
    }

    .deleleBtn {
        padding: 10px 20px;
        background-color: #ff0000;
        color: white;
        border-radius: 6px;
        cursor: pointer;
        border: none;
    }
</style>
<script src="{{ env('APP_URL') }}/assets/jquery/jquery.3.7.1.js"></script>
<script type="module" src="{{ env('APP_URL') }}/assets/frontend/js/chat.js"></script>

<script>
    $(document).ready(function() {
        $('.deleleBtn').on('click', (e) => {
            let conversationId = e.target.getAttribute('conversation-id');
            let chat = new Chat(conversationId, '{{env("FIREBASE_MESSAGE_TABLE_NAME")}}')

            if (confirm('Bạn có chắc chắn muốn xóa cuộc trò chuyện này không?')) {
                var token = $("input[name='_token']").val();
                fetch(`/chat/${conversationId}`, {
                    method: "DELETE",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    },
                    credentials: "same-origin",
                }).then(async (response) => {
                    if (response.status === 200) {
                        await chat.deleteConversation(conversationId);
                        $(e.target).closest('.list-item').remove()
                    }
                })
            }
        });
    })
</script>

@csrf
<h2>Danh sách tin nhắn</h2>
<div class="conversation-container">
    @foreach($conversations as $item)
    <div class="list-item">
        <a href="/chat/{{$item['conversation_id']}}">
            <img src="{{ env('APP_URL') }}/assets/backend/img/hoso/{{ $item['user']?->image }}" alt="">
            <p>
                {{ $item['user']?->name }} - {{ $item['user']?->getDoanhNghiep?->tentiengviet}}
            </p>
        </a>
        <div class="deleleBtn" conversation-id="{{$item['conversation_id']}}">Xóa</div>
    </div>
    @endforeach
</div>

@endsection