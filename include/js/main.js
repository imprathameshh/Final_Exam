let api = fetch('https://fakestoreapi.com/products')
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        console.log(data);
        let output = "";
        data.map(function (item) {
            output += `
        <div class="swiper-slide">
        <div class="api-wrap__left">
                    <h2 class="featured-title">FEATURED</h2>
                    <h3>${item.title}</h3>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    <a href="#">Read More&nbsp;&nbsp; <svg width="23" height="12" viewBox="0 0 23 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.466 0.238643L22.7565 5.42386C23.0812 5.74205 23.0812 6.25794 22.7565 6.57614L17.466 11.7614C17.1413 12.0795 16.615 12.0795 16.2903 11.7614C15.9657 11.4432 15.9657 10.9273 16.2903 10.6091L20.1617 6.81478H0V5.18522H20.1617L16.2903 1.39091C15.9657 1.07272 15.9657 0.556834 16.2903 0.238643C16.615 -0.0795478 17.1413 -0.0795478 17.466 0.238643Z" fill="#503AE7" />
                        </svg>
                    </a>
                    
                </div>
                <div class="api-wrap__right">
                <img id="pro-img" src="${item.image}">
                </div>
                  
            </div>
        </div>`;

        });
        document.getElementById("results").innerHTML = output;
    }).catch((err) => {
        console.log(err);
    });
    



