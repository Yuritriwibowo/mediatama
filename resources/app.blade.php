<script>
let idleTime = 0;
const idleLimit = 600; // 600 detik = 10 menit

function resetIdleTime() {
    idleTime = 0;
}

// Reset idle jika ada aktivitas
window.onload = resetIdleTime;
document.onmousemove = resetIdleTime;
document.onkeydown = resetIdleTime;
document.onscroll = resetIdleTime;
document.onclick = resetIdleTime;

// Hitung waktu idle
setInterval(() => {
    idleTime++;

    if (idleTime >= idleLimit) {
        alert('Sesi Anda telah berakhir karena tidak ada aktivitas.');
        document.getElementById('logout-form').submit();
    }
}, 1000);
</script>
