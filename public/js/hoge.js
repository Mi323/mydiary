console.log("hello from hoge.js");
window.onload = function(){
  const hogeElm = document.getElementById("hogehoge");
  hogeElm.addEventListener('click', () => {
    alert('秘密のメッセージ');
  });
}