<style>
:root {
    --wh-bs: #fff; /* white */
    --or-sp: #ff3a00; /* Orange */
    --bl-sn: #0085ff; /* Blue */
    --bl-sd: #00356663;
    --or-sd: #68180063;
}
.container-fluid {
/* background: rgb(0,133,255);
background: linear-gradient(153deg, rgba(0,133,255,1) 0%, rgba(255,255,255,1) 40%, rgba(255,255,255,1) 50%, rgba(255,255,255,1) 60%, rgba(255,58,0,1) 100%); */
background: rgb(0,133,255);
background: linear-gradient(153deg, rgba(0,133,255,1) 0%, rgba(126,193,255,1) 12%, rgba(202,225,255,1) 34%, rgba(255,219,214,1) 72%, rgba(255,158,131,1) 89%, rgba(255,58,0,1) 100%);
}
.heads {
    max-width: 900px; 
    margin-bottom: 3rem;
    background: rgba(255,255,255, 0.4);
    padding: 2rem 0rem;
}
.logo-abhijaan {
    width: 280px;
    padding-right: 2rem;
}
.logo-b {
    display: hidden;
    width: 70px;
}
.cards {
    max-width: 900px;
}
.cards > div > div {
    padding: 1.5rem 2rem;
    margin: 0.2rem;
    height: max-content;
}
.cards-title {
    color: #ff3a00;
    font-weight: bolder;
    font-size: 2em;
    margin: 1rem 0rem;
}
.cards > div > div:hover {
    box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
    border-radius: 0.3rem;
}
.footer {
    padding: 1rem ;
    letter-spacing: 1px;
    color: #0085ff;
}
</style>


<div class="container-fluid h-full flex-col justify-center">
    <div class="flex align-end justify-end mx-auto w-full heads">
        <div>
            <img class="logo-abhijaan" src="<?= asset('abhijaan_full.png') ?>" alt="abhijaan logo" >
        </div>
        <!-- <div>
            <img src="<?= asset('sp_logo.png') ?>" alt="a" class="logo-b">
        </div> -->
    </div>
    <div class="flex cards mx-auto w-full">
    </div>
    <div class="flex cards mx-auto w-full">
        <div class="w-50">
            <div class="bg-white">
                <p class="cards-title">Documentation</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, possimus magnam voluptatibus minus culpa labore.</p>
            </div>
        </div>
        <div class="w-50">
            <div class="bg-white">
                <p class="cards-title">Examples</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, possimus magnam voluptatibus minus culpa labore.</p>
            </div>
        </div>
    </div>
    <div class="flex cards justify-between mx-auto w-full footer">
        <div>
            <small>copy &copy; 2024</small>
        </div>
        <div>
            <small>abhijaan 0.1.0</small>
        </div>
    </div>
</div>