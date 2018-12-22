function setEditor () {
  $(".editor-content").hide()
  var E = window.wangEditor
  var editor = new E('#editor')
  editor.customConfig.uploadImgServer = '/common/upload/go'
  editor.customConfig.uploadFileName = 'image'
  var $text1 = $('#content')
  editor.customConfig.onchange = function (html) {
    // 监控变化，同步更新到 textarea
    $text1.val(html)
  }
  editor.create()
  // 初始化 textarea 的值
  $text1.val(editor.txt.html())
}