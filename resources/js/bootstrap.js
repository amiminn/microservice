/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import "flowbite";
import "animate.css";

import Swal from "sweetalert2";
window.Swal = Swal;
window.toast = (msg, icon = "success") => {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon,
        title: msg,
    });
};

window.hapus = () => {
    return Swal.fire({
        title: "Apakah yakin ingin menghapus?",
        text: "Data yang terhapus tidak dapat dikembalikan seperti semula!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    });
};

window.getUser = async function () {
    let res = await axios.post("/api/user");
    window.user = res.data;
};

import JsCookie from "js-cookie";
window.jsc = JsCookie;

import AES from "crypto-js/aes";
window.encryptData = (data) => {
    try {
        return AES.encrypt(data, "_x").toString();
    } catch (error) {
        console.error("harap ubah json ke string");
    }
};

import enc from "crypto-js/enc-utf8";
window.decryptData = (data) => {
    return AES.decrypt(data, "_x").toString(enc);
};

import axios from "axios";
window.axios = axios;

try {
    let token = JSON.parse(decryptData(jsc.get("_x")));
    window.axios.defaults.headers.common["Authorization"] = "Bearer " + token;
    window.user = JSON.parse(decryptData(jsc.get("_u")));
    window.isAuth = true;
} catch (error) {
    window.isAuth = false;
}

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.headers.common["X-CSRF-TOKEN"] = window.Laravel.csrfToken;
