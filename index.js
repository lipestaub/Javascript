function redirect (event) {
    if (event.target.id != 'container') {
        const project = event.target.id;

        window.location.href = `/${project}/index.html`;
    }
}

document.getElementById('container').addEventListener('click', redirect);