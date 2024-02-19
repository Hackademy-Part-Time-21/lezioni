<x-layout>

    <ul class="list-unstyled" id="superheroes">

    </ul>

    <script>
        const list = document.getElementById('superheroes');

        fetch('/api/index')
            .then(response => {return response.json()})
            .then(data => {
                for(let item of data){
                    list.innerHTML += `<li>${item.name}</li>`
                }
            })

    </script>

</x-layout>