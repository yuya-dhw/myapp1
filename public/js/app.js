//任意のタブにURLからリンクするための設定
function GethashID (hashIDName){
	if(hashIDName){
		//タブ設定
		$('.tab li').find('a').each(function() { //タブ内のaタグ全てを取得
			var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得	
			if(idName == hashIDName){ //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
				var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）を取得
				$('.tab li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
				$(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
				//表示させるエリア設定
				$(".info__area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
				$(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加	
			}
		});
	}
}

//タブをクリックしたら
$('.tab a').on('click', function() {
	var idName = $(this).attr('href'); //タブ内のリンク名を取得	
	GethashID (idName);//設定したタブの読み込みと
	return false;//aタグを無効にする
});


// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on('load', function () {
    $('.tab li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
    $('.info__area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
	var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
	GethashID (hashName);//設定したタブの読み込み
});

var dropZone = document.getElementById('drop-zone');
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('input-file');

    dropZone.addEventListener('dragover', function(e) {
        e.stopPropagation();
        e.preventDefault();
        this.style.background = '#e1e7f0';
    }, false);

    dropZone.addEventListener('dragleave', function(e) {
        e.stopPropagation();
        e.preventDefault();
        this.style.background = '#ffffff';
    }, false);

    fileInput.addEventListener('change', function () {
        previewFile(this.files[0]);
    });

    dropZone.addEventListener('drop', function(e) {
        e.stopPropagation();
        e.preventDefault();
        this.style.background = '#fff'; //背景色を白に戻す
        this.insertAdjacentHTML('afterbegin','<p class="file__orientation file__succeed">ファイルは正常に登録されました</p>');
        var files = e.dataTransfer.files; //ドロップしたファイルを取得
        if (files.length > 1) return alert('アップロードできるファイルは1つだけです。');
        fileInput.files = files; //inputのvalueをドラッグしたファイルに置き換える。
        previewFile(files[0]);
    }, false);

    function previewFile(file) {
        /* FileReaderで読み込み、プレビュー画像を表示。 */
        var fr = new FileReader();
        fr.readAsDataURL(file);
        fr.onload = function() {
            var img = document.createElement('img');
            img.setAttribute('src', fr.result);
            preview.innerHTML = '';
            preview.appendChild(img);
        };
    }