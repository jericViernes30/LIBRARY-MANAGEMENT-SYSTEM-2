// Get all navbar items
var navItems = document.querySelectorAll('.nav-item-book').forEach(link => {
    if(link.href === window.location.href) {
        link.setAttribute('aria-current', 'page')
    }
})