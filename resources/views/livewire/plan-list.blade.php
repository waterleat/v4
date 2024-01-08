<div>
    <div class="mt-8 mx-auto p-4 sm:p-6 lg:p-8">
        <h4 class="text-2xl font-semibold">Sowing order</h4>

        @forelse ($sorted as $plan)
            @include('livewire.includes.plan-card')
        {{-- <p>{{ $plan->succession->plantType->name }}</p> --}}
        {{-- <section class="bg-white dark:bg-gray-800">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Sowing Seeds</h2>
                    <form action="#" class="space-y-8">
                        <div>
                            <label for="sown" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Date sown</label>
                            <input type="date" id="sown" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" value="{{ $today->format('Y-m-d') }}" required>
                        </div>
                        <div>
                            <label for="variety_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Variety</label>
                            <select  id="variety_id" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" >
                                <option value="seed name"></option>
                                @foreach ($varieties as $variety)
                                    <option key="{{ $variety->id }}" >{{ $variety->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                            <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                        </div>
                        <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send message</button>
                    </form>
                </div>
            </section> --}}
        @empty
            No plans available
        @endforelse
    </div>


    <script type="text/javascript">
        const ht = 30
        const pos = 300
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
            ctx.fillStyle = 'green';
            ctx.fill();
            ctx.closePath()
            
            ctx.beginPath()
            ctx.rect(hs, 0, he-hs, ht);
            ctx.fillStyle = 'purple';
            ctx.fill();
            ctx.closePath()

            ctx.font = "32px Arial";
            ctx.fillStyle = 'gray';
            ctx.fillText(txt, 6, 26);

            ctx.beginPath()
            ctx.rect(yd, 0, 2, ht);
            ctx.fillStyle = 'red';
            ctx.fill();
            ctx.closePath()
              
        });
    </script>

</div>
