var currentBodyHeight = 0;
var annotationTimer;
function sidebarUpdate() {
    if(currentBodyHeight != document.body.scrollHeight) {
        currentBodyHeight = document.body.scrollHeight;
        $('sidebar').height(document.body.scrollHeight);
    }
}
function saveAnnotation() {
    var txt = $('.anno').val();
    $.ajax({
        type:'POST',
        url:BASE_URL+'ajax/annotation',
        data:{lesson:lid, txt:txt},
        beforeSend:function(){
            $('.annotation_box small').html('Salvando...');
        },
        success:function() {
            $('.annotation_box small').html('');
        }
    });
}

function showNotification(msg) {
    $('.notification_area').find('span').html(msg);
    $('.notification_area').fadeIn('slow');
    $('.notification').css('margin-right', '10px');

    setTimeout(function(){
        $('.notification').css('margin-right', '-350px');
        $('.notification_area').fadeOut('slow');
    }, 5000);
}

function openCodeLightbox() {
    $.magnificPopup.close();
}

function closeCodeLightbox() {
    $.magnificPopup.close();
}

function add_code() {
    var code = safe_tags_replace($('#code-modal textarea').val());
    $('.resparea').append('<br/><code>'+code+'</code><br/>');
    //$('.resparea').append('<br/><pre class="lang-php prettyprint"><code>'+code+'</code></pre><br/>');
    //PR.prettyPrint();
    closeCodeLightbox();
}
var tagsToReplace = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;'
};
function replaceTag(tag) {
    return tagsToReplace[tag] || tag;
}

function safe_tags_replace(str) {
    return str.replace(/[&<>]/g, replaceTag);
}

function upImg() {
    var img = $('#radimg')[0].files[0];

    var reader  = new FileReader();

    reader.addEventListener("load", function () {
        var A = new FormData();
        var blobBin = atob(reader.result.split(',')[1]);

        var array = [];
        for(var i = 0; i < blobBin.length; i++) {
            array.push(blobBin.charCodeAt(i));
        }
        var file=new Blob([new Uint8Array(array)], {type: 'image/png'});
        A.append("files", file);

        if (window.XMLHttpRequest) {
            var I = new XMLHttpRequest()
        } else {
            var I = new ActiveXObject("Microsoft.XMLHTTP")
        }
        I.upload.addEventListener("progress", function(K) {
            $('.pgup').show();
            var J = (K.loaded / K.total) * 100;
            $('.pg').css('width', J+'%');
        }, false);
        I.onreadystatechange = function(L) {
            if (I.readyState == 4 && I.status == 200) {
                $('.pgup').hide();
                img = L.target.response;
                if(img != '') {
                    $('.resparea').append('<br/><br/><img src="'+img+'" border="0" /><br/><br/><br/>');
                }
            }
        };
        I.open("POST", '/ajax/imageup', true);
        I.send(A);
    }, false);

    if (img) {
        reader.readAsDataURL(img);
    }
}

function changeAvatar() {
    var img = $('#avatarfile')[0].files[0];

    var reader  = new FileReader();

    reader.addEventListener("load", function () {
        var A = new FormData();
        var blobBin = atob(reader.result.split(',')[1]);

        var array = [];
        for(var i = 0; i < blobBin.length; i++) {
            array.push(blobBin.charCodeAt(i));
        }
        var file=new Blob([new Uint8Array(array)], {type: 'image/png'});
        A.append("files", file);

        if (window.XMLHttpRequest) {
            var I = new XMLHttpRequest()
        } else {
            var I = new ActiveXObject("Microsoft.XMLHTTP")
        }
        I.upload.addEventListener("progress", function(K) {
            /*$('.pgup').show();
             var J = (K.loaded / K.total) * 100;
             $('.pg').css('width', J+'%');*/
        }, false);
        I.onreadystatechange = function(L) {
            if (I.readyState == 4 && I.status == 200) {
                window.location.href = window.location.href;

                img = L.target.response;
                if(img != '') {
                    $('.userphoto').attr('src', img);
                    $('.userinfo_photo').attr('src', img);
                }
            }
        };
        I.open("POST", '/ajax/profileimage', true);
        I.send(A);
    }, false);

    if (img) {
        reader.readAsDataURL(img);
    }
}

$(function() {

    $('#m_a').find('.button').on('click', function() {
        $('#m_a').html('Salvando...');

        $.post({
            url:BASE_URL+'ajax/view',
            data:{lesson:lid,type:'start'},
            success:function(){
                $.post({
                    url:BASE_URL+'ajax/view',
                    data:{lesson:lid,type:'end'},
                    success:function(r){
                        if(r=='1') {
                            showNotification('Você ganhou +1 ponto!');
                        }
                        $('#m_a').html('&nbsp;');
                    },
                    error:function(){
                        $('#m_a').html('&nbsp;');
                    }
                });
            },
            error:function() {
                $('#m_a').html('&nbsp;');
            }
        });
    });

    $('.box-collapse').find('.box-title').on('click', function(){
        var box = $(this).parent();
        if(!box.hasClass('box-closed')) {
            box.find('.box-body').slideUp();
            box.addClass('box-closed');
        } else {
            box.removeClass('box-closed');
            box.find('.box-body').slideDown();
        }
    });

    $('.anno').on('keyup', function(){
        clearTimeout(annotationTimer);
        annotationTimer = setTimeout(saveAnnotation, 1000);
    });

    $('.annotation_button').on('click', function(){
        $(document.body).toggleClass('anno_open');
        player.pause();
    });

    $('.ajax-lightbox').magnificPopup({
        type: 'ajax',
        alignTop: true,
        overflowY: 'scroll'
    });

    $('#addCodeButton').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#codetextarea',
        modal: true,
        showCloseBtn:true
    });

    $('.dis_post_body img').on('click', function(){
        $.magnificPopup.open({
            closeOnContentClick: true,
            items: {
                src: $(this).attr('src')
            },
            type: 'image',
            image: {
                verticalFit: true
            }
        });
    });

    $('#raddimg').on('click', function(){
        $('#radimg').trigger('click');
    });

    $('#changeAvatarBtn').on('click', function(){
        $('#avatarfile').trigger('click');
    });

    $('#respbut').on('click', function(){
        var html = $('.resparea').html();
        $('#rform input[name=resp]').val(html);
        $('#rform').submit();
    });
    /*
     setInterval(function() {
     if($('.resparea').height() < $('.resparea')[0].scrollHeight-30) {
     $('.resparea').height( $('.resparea')[0].scrollHeight + 60 );
     }
     }, 200);
     */
    setInterval(sidebarUpdate, 200);
})
