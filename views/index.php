<style>

.container {
    background: rgb(0,133,255);
    background: linear-gradient(153deg, rgba(0,133,255,1) 0%, rgba(126,193,255,1) 12%, rgba(202,225,255,1) 34%, rgba(255,219,214,1) 72%, rgba(255,158,131,1) 89%, rgba(255,58,0,1) 100%);
}
.heads {
    width: 90vw;
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
.cards > div > div:hover {
    box-shadow: 0px 3px 10px rgba(0,0,0,0.1);
    border-radius: 0.3rem;
}
.footer {
    padding: 1rem ;
    letter-spacing: 1px;
    color: #0085ff;
    width: 90vw;
    max-width: 900px;
}
</style>


<div class="container h-full flex-col justify-center">
    <div class="flex align-end justify-end mx-auto heads">
        <div>
            <img class="logo-abhijaan" src="<?= asset('abhijaan_full.png') ?>" alt="abhijaan logo" >
        </div>
    </div>
    <div class="flex-row cards mx-auto w-full">
        <div class="flex-50">
            <div class="bg-white">
                <p class="card-title text-orange cursor-pointer">Documentation</p>
                <p class="text-gray">Good human readable documentation for beginners.</p>
            </div>
        </div>
        <div class="flex-50">
            <div class="bg-white">
                <p class="card-title text-orange cursor-pointer">Style sheet</p>
                <p class="text-gray">Style your project with inbuilt css classes.</p>
            </div>
        </div>
    </div>
    <div class="flex cards justify-between mx-auto footer">
        <div>
            <small>copy &copy; 2024</small>
        </div>
        <div>
            <small>abhijaan 0.1.0</small>
        </div>
    </div>
</div>