@extends('layouts.dashboard')
@section('home-active','sidebar-active')
@section('site-title','- Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-9">
            <div style="overflow: hidden;">
                <div class="content-overlay" style="display:none;position: absolute;background-color: rgba(0,0,0,0.5);">
                    <center>
                    <p style="margin-top: 110px;color: #FFF;">Membagikan post...</p>
                    </center>
                </div>
            	@if(auth()->user()->isRole('siswa'))
                <div class="content-wrapper">
                	<h2 style="font-size: 16px;">Selamat Datang di e-School</h2>
                	<form method="post" class="form-posts" enctype="multipart/form-data" onsubmit="savePost(this); return false">
                		<div class="form-group posts-group">
                			<textarea name="contents" class="form-control z-techno-el" rows="5" style="resize: none;" placeholder="Katakan sesuatu tentang hari ini.."></textarea>
                            <!-- <div class="z-techno-btn-group">
                                <button type="button" id="fileUploadPostBtn" onclick="fileUploadPost.click()" class="btn z-techno-btn z-techno-btn-float">File</button>
                                <button type="button" id="gambarUploadPostBtn" onclick="gambarUploadPost.click()" class="btn z-techno-btn z-techno-btn-float">Gambar</button>
                            </div> -->
                			<select class="form-control z-techno-el select2" name="post_as">
                                <option value="Semua Orang">Semua Orang</option>
                				<option value="Catatan Pribadi">Catatan Pribadi</option>
                				<option value="Teman Sekelas">Teman Sekelas</option>
                			</select>
                		</div>
                		<button class="btn z-techno-btn z-techno-primary">Bagikan</button>
                	</form>
                </div>
                @elseif(auth()->user()->isRole('guru'))
                <div class="content-wrapper">
                    <h2 style="font-size: 16px;">Selamat Datang di e-School</h2>
                    <form method="post" class="form-posts" enctype="multipart/form-data" onsubmit="savePost(this); return false">
                        <div class="form-group posts-group">
                            <textarea name="contents" class="form-control z-techno-el" rows="5" style="resize: none;" placeholder="Katakan sesuatu tentang hari ini.."></textarea>
                            <!-- <div class="z-techno-btn-group">
                                <button type="button" id="fileUploadPostBtn" onclick="fileUploadPost.click()" class="btn z-techno-btn z-techno-btn-float">File</button>
                                <button type="button" id="gambarUploadPostBtn" onclick="gambarUploadPost.click()" class="btn z-techno-btn z-techno-btn-float">Gambar</button>
                            </div> -->
                            <select name="post_as" class="form-control z-techno-el select2" onchange="postType.style.display = 'none'; if(this.value != 'Catatan Pribadi' && this.value != 'Semua Orang' && this.value != '') postType.style.display = 'block'" required="">
                                <!-- <option value="">Bagikan Ke / Sebagai</option> -->
                                <option value="Semua Orang">Semua Orang</option>
                                <option value="Catatan Pribadi">Catatan Pribadi</option>
                                <option value="Pengumuman">Pengumuman</option>
                                <option value="Tugas">Tugas</option>
                                <option value="Materi">Materi</option>
                            </select>
                            <select class="form-control z-techno-el select2" id="postType" name="post_as_id" style="display: none;">
                                <?php $ids = [] ?>
                                @foreach(auth()->user()->classrooms as $classroom)
                                <?php if(in_array($classroom->id, $ids)) continue; $ids[] = $classroom->id; ?>
                                <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                                @endforeach
                            </select>
                            <div style="display: none">
                                <input type="file" name="file" id="fileUploadPost" onchange="fileUploadPostBtn.innerHTML = '1 File Terpilih'">
                                <input type="file" name="gambar" id="gambarUploadPost" onchange="gambarUploadPostBtn.innerHTML = '1 Gambar Terpilih'">
                            </div>
                        </div>
                        <button class="btn z-techno-btn z-techno-primary">Bagikan</button>
                    </form>
                </div>
                @else
                <div class="content-wrapper">
                	<h2 style="font-size: 16px;">Selamat Datang di e-School</h2>
                	<form method="post" class="form-posts" enctype="multipart/form-data" onsubmit="savePost(this); return false">
                		<div class="form-group posts-group">
                			<textarea name="contents" class="form-control z-techno-el" rows="5" style="resize: none;" placeholder="Katakan sesuatu tentang hari ini.."></textarea>
                			<!-- <div class="z-techno-btn-group">
                				<button type="button" id="fileUploadPostBtn" onclick="fileUploadPost.click()" class="btn z-techno-btn z-techno-btn-float">File</button>
                				<button type="button" id="gambarUploadPostBtn" onclick="gambarUploadPost.click()" class="btn z-techno-btn z-techno-btn-float">Gambar</button>
                			</div> -->
                			<select name="post_as" class="form-control z-techno-el select2" onchange="postType.style.display = 'none'; if(this.value != 'Catatan Pribadi' && this.value != 'Semua Orang' && this.value != '') postType.style.display = 'block'" required="">
                				<!-- <option value="">Bagikan Ke / Sebagai</option> -->
                				<option value="Semua Orang">Semua Orang</option>
                                <option value="Catatan Pribadi">Catatan Pribadi</option>
                				<option value="Pengumuman">Pengumuman</option>
                			</select>
                			<div style="display: none">
                				<input type="file" name="file" id="fileUploadPost" onchange="fileUploadPostBtn.innerHTML = '1 File Terpilih'">
                				<input type="file" name="gambar" id="gambarUploadPost" onchange="gambarUploadPostBtn.innerHTML = '1 Gambar Terpilih'">
                			</div>
                		</div>
                		<button class="btn z-techno-btn z-techno-primary">Bagikan</button>
                	</form>
                </div>
                @endif
            </div>
            <br>

            <div class="post-list"></div>
        </div>

        <div class="col-lg-3 col-md-12">
        	
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" defer>
var es,savePostStatus = false;
async function loadPosts(url = false)
{
    $('.post-list').html("Loading...")
    if(!url)
        url = window.config.getApiUrl()+'/get-posts'
    let response = await fetch(url,{
        method:'POST',
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify({
            user_id:'{{auth()->user()->id}}',
        })
    })

    let data = await response.json()
    window.id = data.id
    window.all_posts  = []
    data.all_posts.forEach(value => {
        var jsonData = JSON.parse('{"'+value.id+'":0}')
        window.all_posts.push(jsonData)
    })

    $('.post-list').html("")
    $('.post-list').html(data.html)
    return data.id

}

async function savePost(el)
{
    var frm = $(el);
    var contentWrapper = $('.content-wrapper');
    var overlay = $('.content-overlay');
    overlay.css('width',contentWrapper.outerWidth())
    overlay.css('height',contentWrapper.outerHeight())
    overlay.css('display','block')
    let response = await fetch(window.config.getApiUrl()+'/save-post',{
        method:'POST',
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify({
            user_id:'{{auth()->user()->id}}',
            contents:$('textarea[name=contents]').val(),
            post_as:$('select[name=post_as]').val(),
            post_as_id:$('select[name=post_as_id]').val(),
        })
    })

    let data = await response.json()
    if(data.success)
    {
        // await loadPosts()
        savePostStatus = true
        el.reset()
    }
    overlay.css('display','none')
    return false
}

async function saveComment(el)
{
    event.preventDefault();
    var frm = $(el)
    let response = await fetch(window.config.getApiUrl()+'/save-comment',{
        method:'POST',
        headers:{
            'Content-Type':'application/json'
        },
        body:JSON.stringify({
            user_id:frm.find('input[name=user_id]').val(),
            post_id:frm.find('input[name=post_id]').val(),
            contents:frm.find('textarea[name=contents]').val(),
        })
    })

    if(frm.find('input[name=type]') != undefined && frm.find('input[name=type]').val() == 'Tugas')
    {
        let loadPost = await fetch(window.config.getApiUrl()+'/load-single-post/{{auth()->user()->id}}/'+frm.find('input[name=post_id]').val())
        let responsePost = await loadPost.json()
        $('.post-id-'+frm.find('input[name=post_id]').val()).html(responsePost.html)
    }
    else
    {

        let data = await response.json()
        el.reset()
        document.getElementById('btn-show-comment-'+frm.find('input[name=post_id]').val()).click()
    }
    // document.getElementById('btn-hide-comment-'+frm.find('input[name=post_id]').val()).style.display = 'block'
    // document.getElementById('btn-show-comment-'+frm.find('input[name=post_id]').val()).style.display = 'none'

    // if(data.success)
    //     await loadPosts()
    return false
}

async function loadComments(id)
{
    let loadComments = await fetch(window.config.getApiUrl()+'/load-comments/'+id)
    let responseComments = await loadComments.json()
    $('#post-comment-'+id).html(responseComments.html)
}


$('body').on('click', '.pagination a', function(e) {
    e.preventDefault();

    var url = $(this).attr('href');  
    var page = window.getParam('page',url);
    // es.close();
    loadPosts(url).then(id => {
        setupStream();
    });
    window.current_page = page
    window.history.pushState("", "", "#page-"+page);
});

function setupStream() {
    // Not a real URL, just using for demo purposes
    if(es != undefined)
    {
        es.close()
        console.log('connection closed')
    }

    if(window.current_page > 1)
        es = new EventSource(window.config.getApiUrl()+'/retrieve-posts/{{auth()->user()->id}}?page='+window.current_page);
    else
        es = new EventSource(window.config.getApiUrl()+'/retrieve-posts/{{auth()->user()->id}}');

    es.addEventListener('newPosts', event => {
        let data = event.data;
        if(data != 0)
        {
            data = JSON.parse(data)
            if(window.current_page != 1 && savePostStatus)
            {
                window.current_page = 1
                loadPosts().then(id => {
                    setupStream()
                })
            }
            if(data.id != window.id)
            {
                window.id = data.id
                // let old = $('.post-list').html();
                // data = data.html // + '' + old
                $('.post-list').html(data.html)
            }

            savePostStatus = false
        }
    }, false);

    es.addEventListener('newComments', event => {
        let data = event.data;
        if(data != 0)
        {
            data = JSON.parse(data)
            data.forEach(value => {
                if(window.all_posts[value.post_id] != value.comment_id)
                {
                    $('#post-comment-'+value.post_id).html(value.html)
                    window.all_posts[value.post_id] = value.comment_id
                }
            })
        }
    }, false);

    es.addEventListener('error', event => {
        if (event.readyState == EventSource.CLOSED) {
            console.log('Event was closed');
            console.log(EventSource);
        }
    }, false);
}

loadPosts().then(id => {
    setupStream();
});
</script>
@endsection