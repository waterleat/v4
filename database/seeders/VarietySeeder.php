<?php

namespace Database\Seeders;

use App\Models\Variety;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $varieties = [
            [
                'name' => 'Boltardy', 'plant_type_id' => 1, 'info' => 'Good cropper, round red roots',
                'description' => "Our favourite long season variety, it's the first we sow and the last.  Very reliable, great taste and stores well", 
                'days2maturity' => 75, 'height' => 0.9, 'spread' => 0.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 99, 
                'sowing' => 'Feb, Mar, Apr, May, Early-June', 'harvest' => 'May, Jun, Jul, Aug, Sep, Oct', 'store' => 'Oct', 
            ],
            [
                'name' => 'Red Drumhead', 'plant_type_id' => 4, 'info' => 'info',
                'description' => 'Cabbages harvested in November/December can be stored for months, even if the outer leaves go mouldy, inner leaves are fine  Cabbage Red Drumhead is a popular deep red heirloom variety which produces densely packed leafy heads with dark red, solid hearts in late summer through to Christmas. This old hardy variety from the 1860s is easy to grow, stores well and is remarkably tasty and sweet.   Red Drumhead is renowned for cooking and pickling, holding its flavour and deep purple-red colour. The colourful vitamin-rich heads are delicious cooked or raw in salads and coleslaw.  Vigorous plants are easy to grow and are adaptable to heat, but for the best flavour they are best timed so the heads mature in the cool weather. ', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 99, 
                'sowing' => 'Mar, Apr, Aug-mid, Sep-mid', 'harvest' => 'Jun, Jul, Sep, Oct, Nov, Dec, Jan', 'store' => '', 
            ],
            [
                'name' => 'Medania', 'plant_type_id' => 13, 'info'=> 'over winters CD',
                'description' => 'desc', 
                'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3,
                'sow_direct' => false, 'multi' => 2, 'spacing' => 9, 
                'sowing' => 'Feb, Mar, Apr, Aug-mid, Sep', 'harvest' => 'Mar, Apr, May, Oct, Nov', 'store' => '', 
            ],
            [
                'name' => 'Steak Sandwich', 'plant_type_id' => 15, 'info' => 'good for slicing, good flavour ',
                'description' => 'desc',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18, 
                'sowing' => 'Mar-late, Apr', 'harvest' => 'Jul, Aug, Sep, Oct', 'store' => '', 
            ],
            [
                'name' => 'Sungold', 'plant_type_id' => 15, 'info' => 'early heavy cropper, sweet, thin skins',
                'description' => 'desc',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18, 
                'sowing' => 'Mar-late, Apr', 'harvest' => 'Jul, Aug, Sep, Oct', 'store' => '', 
            ],
            [
                'name' => 'Carrot Early Nantes 2', 'plant_type_id' => 6, 'info' => 'info',
                'description' => 'This is our go-to carrot for eating fresh from the ground as soon as it reaches maturity.  As a result we will normally sow it along with a slower maturing variety that holds in the ground better, to provide a longer harvest from the same bed.  It is a 2nd early and maincrop Nantes (tapered stump) type, virtually coreless with good texture, colour and flavour. ', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => true, 'multi' => 1, 'spacing' => 3, 
                'sowing' => 'May, Jun, Jul, Aug', 'harvest' => 'Aug, Sep, Oct, Nov, Dec', 'store' => '', 
            ],
            [
                'name' => 'Aquadulce claudia', 'plant_type_id' => 2, 'info' => 'info',
                'description' => 'Very reliable over winter.  We prefer to sow ours in late October or November so that they over-winter as small plants that will withstand the winter weather.  They will catch up with earlier sown beans in spring and probably be healthier', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => true, 'multi' => 1, 'spacing' => 99, 
                'sowing' => 'Oct (late), Nov, Feb (late), Mar', 'harvest' => 'May, Jun, Jul', 'store' => '', 
            ],
            [
                'name' => 'Blue Solaise', 'plant_type_id' => 11, 'info' => 'info',
                'description' => "This French heritage variety makes an attractive addition to the vegetable plot, or even dotted among flower borders for a strong vertical accent. It's distinctive blue leaves take on an eye catching purple tinge as winter temperatures drop. Leek 'Bleu de Solaise' is a reliable winter variety producing short, heavy stems that will stand well through even the most atrocious winter weather. Height: 45cm (18in). Spread: 30cm (12in).", 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 3, 'spacing' => 12, 
                'sowing' => 'Mar, Apr', 'harvest' => 'Dec, Jan, Feb, Mar', 'store' => '', 
            ],
            [
                'name' => 'Summer Purple', 'plant_type_id' => 3, 'info' => 'info', 
                'description' => 'British breeding especially for summer cropping as needs no vernalisation (winter chill) to produce tasty purple spears. Robust plants will produce high yields if picked regularly to promote fresh flushes of spears. Broccoli Summer Purple has good heat tolerance. Crops from July to November if sown at regular intervals.  Sow seeds at intervals from March to June. Sow thinly in a well-prepared seedbed, 12mm deep. Keep watered during dry weather.  Transplant seedlings when large enough to handle, about 5 weeks from sowing, allowing a minimum of 6cm (2ft) between plants in the row and 75cm (3in) between rows. Firm in well and keep watered until established. Net against pigeons and cabbage caterpi  Pick regularly to promote fresh flushes of spears.', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18, 
                'sowing' => 'Mar', 'harvest' => 'May, Jun, Jul, Aug', 'store' => '', 
            ],
            [
                'name' => 'De Cicco', 'plant_type_id' => 5, 'info' => 'info', 
                'description' => 'Days To Maturity: 90. Days To Germination: 7-10. Planting Depth: 1/8 inch. Spacing, Row: 24-36 inches. Spacing, Plant: 12-18 inches. Light: Mostly Sunny Location. Sow thinly under cover 4-6 weeks prior to the last frost at 1/8in depth. For outdoor sowings 2-4 weeks prior to the last frost in drills 12 in apart. For autumn sowings sow outside 6-8 weeks prior to the last frost. Transplant / thin to 1in apart and grow on. For seedlings raised under cover gradually harden off and plant out 12-18 in apart. Broccoli likes rich, heavily mulched soil. When transplanting add bone meal to the soil around the plant. Harvest the main head at 2-3 inches to encourage the vigorous side shoots.', 
                'days2maturity' => 90, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18, 
                'sowing' => 'Apr, May, Sep', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'All year round', 'plant_type_id' => 7, 'info' => 'info', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => 'Mar, Apr, May, Oct, Sep-mid', 'harvest' => 'Jun, Jul, Aug, Sep, Oct', 'store' => '', 
],
            [
                'name' => 'Marketmore 76', 'plant_type_id' => 8, 'info' => 'can be grown outdoors', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Waverex', 'plant_type_id' => 12, 'info' => 'info', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Starlight', 'plant_type_id' => 12, 'info' => 'info', 
                'description' => 'sow 5cm deep', 
                'days2maturity' => 99, 'height' => 0.6, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => 'Mar to early June', 'harvest' => 'May to October', 'store' => '', 
            ],
            [
                'name' => 'Growie', 'plant_type_id' => 14, 'info' => 'info', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Outdoor Girl', 'plant_type_id' => 15, 'info' => 'info', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Green Bush', 'plant_type_id' => 16, 'info' => 'info', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Field Bean tips', 'plant_type_id' => 9, 'info' => 'info', 
                'description' => 'An amazing winter and spring green.  Plant every 4-6 inches as a green manure and just keep harvesting the new shoots, try to leave two shoot to grow on.  New shoots will spring up from the base to be harvested a few weeks later.  Grows well at the time when all of the other spinach alternatives are slowing down, stopped or dead.  ', 
                'sow_direct' => true, 'multi' => 1, 'spacing' => 8, 
                'sowing' => 'Sep-mid, Oct', 'harvest' => 'Nov, Dec, Feb, Mar, Apr', 'store' => '', 
            ],
            [
                'name' => 'Chives Cipollina', 'plant_type_id' => 1, 'info' => 'info', 
                'description' => 'One of the most popular culinary herbs with narrow, grass-like leaves giving a  mild onion-like flavour.  A bulb spreads and forms clumps of tubular leaves 12-18 inches high and is also very decorative in full bloom with ball-shaped lavender-pink flowers.', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Greyhound', 'plant_type_id' => 4, 'info' => 'info', 
                'description' => '', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
                'sowing' => '', 'harvest' => '', 'store' => '', 
            ],
            [
                'name' => 'Jalepeno hot pepper', 'plant_type_id' => 20, 'info' => 'info', 
                'description' => 'Moderate heat.  Jalapeño peppers are a staple food in Mexico and the American Southwest. These steady producers may take a little while to flower, but once they start they keep on producing throughout the growing season. The plants grow to about 3’ in height and produce blunt-ended fruits with thick, dark green skins that turn to bright red when fully ripe.  The flavour deepens as the peppers ripen and both colours have their classic uses. The green peppers are most often used for roasting, stuffing, pickling and salsas. The gorgeous red peppers are often mesquite-smoked into chipotle, strung on ristras for easy access, or dried and made into a hot chile powder.  Like most peppers, jalapeño’s are self-pollinating—they’re not dependent on insects for fertility, just a little bit of wind.', 
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18, 
                'sowing' => 'Dec, Jan, Feb, Mar', 'harvest' => 'Jul, Aug, Sep, Oct', 'store' => '', 
            ],
        ];
        // [
        //     'name' => '', 'plant_type_id' => 1, 'info' => 'info', 
        //     'description' => '', 
        //     'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
        //     'sow_direct' => false, 'multi' => 1, 'spacing' => 1, 
        //     'sowing' => '', 'harvest' => '', 'store' => '', 
        // ],
        // [
        //     'name' => 'White Lisbon', 'plant_type_id' => 'Salad Onion', 'info' => 'info',
        //     'description' => "Very cheap to buy we love White Lisbon and grow it as our main variety over winter for a spring harvest.  We love the very crisp stem and mild sweet taste.  It's a bit floppy over winter sometimes, but it cleans up well. It's fine sown in spring, but we have better alternatives.", 
        //     'sow_direct' => false, 'multi' => 9, 'spacing' => 6, 
        //     'sowing' => 'Aug, Sep', 'harvest' => 'Dec, Jan, Feb, Mar, Apr', 'store' => '', 
        // ],

        foreach( $varieties as $key => $value ) {
            Variety::create($value);
        }
    }
}
