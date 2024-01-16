<div>
    <div class="mt-8 mx-auto p-4 sm:p-6">
        <h4 class="text-2xl font-semibold">Sowing order</h4>

        @forelse ($sorted as $plan)
            @include('livewire.includes.plan-card')
        @empty
            No plans available
        @endforelse
    </div>


    <script type="text/javascript">
        const ht = 30
        const pos = 200
        const txt = "J F M A M J J A S O N D 2 F M A M J J A S O N D 3 F M A M J J A S O N D"

        const suclist = document.querySelectorAll(".year");

        suclist.forEach((yv) => {

            var el = yv.dataset.el
            var ss = yv.dataset.ss
            var se = yv.dataset.se
            var ps = yv.dataset.ps
            var pe = yv.dataset.pe
            var hs = yv.dataset.hs
            var he = yv.dataset.he

            var yd = Number(yv.dataset.yd)
            if (yd<pos) {yd = Number(yd)+365}

            
            var canvas = document.getElementById(el);
            var ctx = canvas.getContext("2d");
            
            ctx.translate(pos-yd, 0)
            
            ctx.beginPath()
            ctx.rect(ss, 0, se-ss, ht);
            ctx.fillStyle = 'orange';
            ctx.fill();
            ctx.closePath()

            ctx.beginPath()
            ctx.rect(ps, 0, pe-ps, ht);
            ctx.fillStyle = 'olivedrab';
            ctx.fill();
            ctx.closePath()
            
            ctx.beginPath()
            ctx.rect(hs, 0, he-hs, ht);
            ctx.fillStyle = 'darkorchid';
            ctx.fill();
            ctx.closePath()

            ctx.font = "32px Arial";
            ctx.fillStyle = 'darkgray';
            ctx.fillText(txt, 6, 26);

            ctx.beginPath()
            ctx.rect(yd, 0, 2, ht);
            ctx.fillStyle = 'red';
            ctx.fill();
            ctx.closePath()
              
        });
    </script>

</div>
