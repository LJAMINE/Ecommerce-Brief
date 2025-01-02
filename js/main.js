const addProductButton = document.getElementById('addProductButton');
const productDrawer = document.getElementById('productDrawer');
const closeme = document.getElementById('closeme');

addProductButton.addEventListener('click', () => {
    productDrawer.classList.add('active');
});

closeme.addEventListener('click', () => {
    productDrawer.classList.remove('active');
});

// const logoutButton = document.getElementById('logoutButton');
// logoutButton.addEventListener('click', () => {
//     window.location.href = '../../pages/login.php';
// });



const viewClientsButton = document.getElementById('viewClientsButton');
viewClientsButton.addEventListener("click",() => {
    window.location.href='../../dashboard/admin/clients.php';
})

const viewOrdersButton = document.getElementById('viewOrdersButton');
viewOrdersButton.addEventListener("click",() => {
    window.location.href='../../dashboard/admin/orders.php';
})

const viewStatsButton = document.getElementById('viewStatsButton');
viewStatsButton.addEventListener("click",() => {
    window.location.href='../../dashboard/admin/stats.php';
})