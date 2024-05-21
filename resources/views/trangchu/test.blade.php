<style>
    .image {
        width: 25px;
        height: 25px;
        object-fit: contain;
    }
</style>

<script script src="{{ env('APP_URL') }}/assets/jquery/jquery.3.7.1.js">
</script>
<script>
    function openSearch(text) {
        window.open(`https://www.google.com/search?sca_esv=a8657e4f00d25584&sca_upv=1&sxsrf=ADLYWILVC6PvWzOU78Ew39xucvkIlPrWPA:1715836380893&q=${text}`, '_blank')
    }

    function uploadFile(userid) {
        var file = $(`input#${userid}`)[0].files[0]
        var formData = new FormData();
        formData.append('file', file);
        formData.append('id', userid);
        fetch("{{ url('/test') }}", {
            method: 'POST',
            body: formData
        }).then(response => {
            location.reload();
        })
    }

    async function onSubmit(userid) {
        let url = $('input#text-' + userid).val()
        var blob = await fetch(url).then(response => response.blob())
        if (blob.type !== 'image/jpeg' && blob.type !== 'image/png' && blob.type !== 'image/jpg' && blob.type !== 'image/gif' && blob.type !== 'image/webp' && blob.type !== 'image/svg+xml' && blob.type !== 'image/bmp' && blob.type !== 'image/tiff' && blob.type !== 'image/ico' && blob.type !== 'image/x-icon' && blob.type !== 'image/x-icon')
            return
        let file = new File([blob], "filename.jpg");
        console.log('🚀 ~ file: ', file)
        var formData = new FormData();
        formData.append('file', file);
        formData.append('id', userid);
        fetch("{{ url('/test') }}", {
            method: 'POST',
            body: formData
        }).then(response => {
            location.reload();
        }).catch(error => {
            // console.log(error);
        });

    }
</script>

<div class="container">
    @foreach($doanhnghiep as $dn)
    @if (!$dn->getUser->image)
    <div style="display:flex; gap:5px; margin-bottom:6px;">
        <a href="" onclick="openSearch('{{$dn->tentiengviet}}')">{{$dn->id}}. {{$dn->tentiengviet}}</a>
        <input onchange="uploadFile('{{$dn->getUser->id}}')" type="file" name="" id="{{$dn->getUser->id}}">
        <input type="text" id="text-{{$dn->getUser->id}}">
        <button onclick="onSubmit('{{$dn->getUser->id}}')">Submit</button>
    </div>
    @endif
    @endforeach
    <script src="https://sf-cdn.coze.com/obj/unpkg-va/flow-platform/chat-app-sdk/0.1.0-beta.2/libs/oversea/index.js"></script>
    <script>
        new CozeWebSDK.WebChatClient({
            config: {
                bot_id: '7370555715939188744',
            },
            componentProps: {
                title: 'Coze',
            },
        });
    </script>
</div>