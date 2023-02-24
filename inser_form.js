function kt() {
    // main return
    let check = true;

    // data from insert form
    let tieu_de = document.getElementById("tieu_de").value;
    let noi_dung = document.getElementById("noi_dung").value;
    let anh = document.getElementById("anh").value;

    // regex js
    let regex_anh = /(https?:\/\/.*\.(?:png|jpg))/i;

    // check condition
    if (anh.length == 0 || !regex_anh.test(anh)) {
        check = false;
        document.getElementById("error_anh").innerHTML =
         "Vui lòng kiểm tra lại dữ liệu đã nhập";
    }
    else {
        document.getElementById("error_anh").innerHTML = "";
    }
    if (noi_dung.length == 0 || noi_dung.includes("<script>")) {
        check = false;
        document.getElementById("error_noi_dung").innerHTML = 
        "Vui lòng kiểm tra lại dữ liệu đã nhập";
    } 
    else {
        document.getElementById("error_noi_dung").innerHTML = "";
    }
    if(tieu_de.length == 0 || tieu_de.includes("<script>")){
        check = false;
        document.getElementById("error_tieu_de").innerHTML = 
        "Vui lòng kiểm tra lại dữ liệu đã nhập";
    }
    else{
        document.getElementById("error_tieu_de").innerHTML = "";
    }
    return check;
}
