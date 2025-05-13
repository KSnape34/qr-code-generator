document.addEventListener('DOMContentLoaded', ()=> {
    const container = document.getElementById('container');
    const form = document.getElementById('grForm');
    const textInput = document.getElementById('text');
    const generateBtn = document.getElementById('generateBtn');
    const qrCodeResult = document.getElementById('qrCodeResult');

    container.addEventListener('submit', function(event){
        const text = textInput.value.trim();
        if(text === ''){
            //prevent form submission
            event.preventDefault();
            // remove and read shake class to the form
            container.classList.remove('shake');
            // force to reflow
            void container.offsetWidth;
            container.classList.add('shake');

            return;
        }

        event.preventDefault(); //Prevent default behaviour anyway
        const formData = new FormData(form);

        fetch('generate.php', {
            method: 'POST',
            body: formData
        })
    });
});