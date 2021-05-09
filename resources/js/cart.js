function initCart() {
    return getCart();
}

function getCart() {
    var cart = Cookies.get("cart");
    if (!cart) {
        cart = {};
    } else {
        cart = JSON.parse(cart); //方法把會把一個JSON字串轉換成JavaScript的數值或是物件
    }
    return cart;
    // return !cart ? {} : JSON.parse(cart);
}
function saveCart(cart) {
    Cookies.set("cart", JSON.stringify(cart));
}
function addProductToCart(productId, quantity) {
    var cart = getCart();
    var currentquantity = parseInt(cart[productId]) || 0;
    var addQuantity = parseInt(quantity) || 0;
    var newQuantity = currentquantity + addQuantity;
    cart[productId] = newQuantity;
    updateproductToCart(productId, newQuantity);
}
function updateproductToCart(productId, newQuantity) {
    var cart = getCart();
    cart[productId] = newQuantity;
    saveCart(cart);
}
function alertProductQuantity(productId) {
    var cart = getCart();
    var quantity = parseInt(cart[productId]) || 0;
    alert(quantity);
}
function initAddToCart() {
    var addToCatBtn = document.querySelector("#addToCart");

    if (addToCatBtn) {
        addToCatBtn.addEventListener("click", function() {
            var quantityInput = document.querySelector(
                'input[name="quantity"]'
            );
            if (quantityInput) {
                addProductToCart(productId, quantityInput.value);
                alertProductQuantity(productId);
            }
        });
    }
}
function initCartDeleteButton(actionUrl) {
    var cartDeleteBtns = document.querySelectorAll(".cartDeleteBtn"); //選取所有class名稱為cartDeleteBtn的標籤
    for (var index = 0; index < cartDeleteBtns.length; index++) {
        var cartDeleteBtn = cartDeleteBtns[index];
        cartDeleteBtn.addEventListener("click", function(e) {
            //代入的參數 e，代表 event，透過這個方法可以得到當事件發生時，發生事件的元素上的各種資訊
            var btn = e.target; //指向最初觸發事件的 DOM 物件
            var dataId = btn.getAttribute("data-id"); //回傳元素指定的屬性值
            var formData = new FormData(); //要送出去是dlete的話要加上delete
            //FormData()可為表單資料中的欄位/值建立相對應的的鍵/值對（key/value）集合，之後便可使用 XMLHttpRequest.send() 方法來送出資料。
            formData.append("_method", "DELETE");
            //append(),追加新值到 FormData 物件已有的對應鍵上；若該鍵不存在，則為其追加新的鍵。
            var csrfTokenMeta = document.querySelector(
                //找到我們設定的_token值
                'meta[name="csrf-token"]'
            );
            var csrfToken = csrfTokenMeta.content; //而那個值是放在conten裡面，把它加進去
            formData.append("_token", csrfToken);
            formData.append("id", dataId);
            var request = new XMLHttpRequest();
            request.open("POST", actionUrl); //要讀取的網址
            request.onreadystatechange = function() {
                //存储函数（或函数名），每当 readyState 属性改变时，就会调用该函数
                if (
                    request.readyState === XMLHttpRequest.DONE && //常數值 4，伺服端回應結束，可能是資料傳輸完成，或者是傳送過程因發生錯誤而中斷
                    request.status === 200
                ) {
                    //檢查伺服器傳回的 HTTP 狀態碼。所有狀態碼列表可於 W3C 網站上查到，但我們要管的是 200 OK 這種狀態
                    //readyState裡面有五個狀態碼
                    console.log(request.responseText);
                    window.location.reload(); //重新整理
                }
            };
            request.send(formData); //送出去的資料
        });
    }
}

export { initAddToCart, initCartDeleteButton };
