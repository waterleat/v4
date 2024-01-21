<?php

namespace Database\Seeders;

use App\Models\Variety;
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
                'name' => 'Medania', 'plant_type_id' => 13, 'info' => 'over winters CD',
                'description' => 'desc',
                'days2maturity' => 75, 'height' => 0.3, 'spread' => 0.3,
                'sow_direct' => false, 'multi' => 2, 'spacing' => 9,
                'sowing' => 'Feb, Mar, Apr, Aug-mid, Sep', 'harvest' => 'Mar, Apr, May, Oct, Nov', 'store' => '',
            ],
            [
                'name' => 'Steak Sandwich', 'plant_type_id' => 15, 'info' => 'good for slicing, good flavour ',
                'description' => 'desc',
                'days2maturity' => 70, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18,
                'sowing' => 'Mar-late, Apr', 'harvest' => 'Jul, Aug, Sep, Oct', 'store' => '',
            ],
            [
                'name' => 'Sungold', 'plant_type_id' => 15, 'info' => 'early heavy cropper, sweet, thin skins',
                'description' => "Exceptionally sweet, bright tangerine-orange cherry tomatoes leave everyone begging for more. Vigorous plants start yielding early and bear right through the season. Tendency to split precludes shipping, making these an exclusively fresh-market treat. The taste can't be beat. 15-20 gm. fruits. Indeterminate.",
                'days2maturity' => 57, 'height' => 9.9, 'spread' => 9.9,
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
                'name' => 'Aquadulce Claudia', 'plant_type_id' => 2, 'info' => 'info',
                'description' => 'Very reliable over winter.  We prefer to sow ours in late October or November so that they over-winter as small plants that will withstand the winter weather.  They will catch up with earlier sown beans in spring and probably be healthier',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => true, 'multi' => 1, 'spacing' => 99,
                'sowing' => 'Oct (late), Nov, Feb (late), Mar', 'harvest' => 'May, Jun, Jul', 'store' => '',
            ],
            [
                'name' => 'Blue De Solaise', 'plant_type_id' => 11, 'info' => 'info',
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
                'name' => 'De Cicco', 'plant_type_id' => 5, 'info' => 'De Ciccio is a compact plant and very productive producing an early central blue-green head, followed by numerous side shoots into early summer.',
                'description' => 'One of the best of the old-fashioned Italian broccolis, this Italian heirloom variety is suitable for fall and spring sowing. Days To Maturity: 90. Days To Germination: 7-10. Planting Depth: 1/8 inch. Spacing, Row: 24-36 inches. Spacing, Plant: 12-18 inches. Light: Mostly Sunny Location. Sow thinly under cover 4-6 weeks prior to the last frost at 1/8in depth. For outdoor sowings 2-4 weeks prior to the last frost in drills 12 in apart. For autumn sowings sow outside 6-8 weeks prior to the last frost. Transplant / thin to 1in apart and grow on. For seedlings raised under cover gradually harden off and plant out 12-18 in apart. Broccoli likes rich, heavily mulched soil. When transplanting add bone meal to the soil around the plant. Harvest the main head at 2-3 inches to encourage the vigorous side shoots. The leaves can also be used as spring greens.',
                'days2maturity' => 90, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18,
                'sowing' => 'Apr, May, Sep', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'All year round', 'plant_type_id' => 7, 'info' => 'Best planted in summer and overwintered for harvesting the following year. Ideal for succession sowing.',
                'description' => 'A popular and reliable English Heirloom variety that can be sown and harvested in all the cauliflower periods, although, best planted in summer and overwintered for harvesting the following year. Ideal for succession sowing.  The dwarf compact plants will make very large, tight heads and are one of the easiest to grow as well. Prefers a moist, rich well drained soil for optimum heads.
                Type: Hardy Biennial
                Time to Germinate: 3-10 Days
                Temperature Required: 12-26°c
                Days to Maturity: 70-80 Days
                Light: Partial Shade/Full Sun
                Sow seeds Feb-May or Jul-Oct for over-wintering.
                Sow in pots or trays in good fine seed compost with a 6mm covering of compost or vermiculite at a minimum of 15c.
                Can be sown directly to a seed bed when the soil has warmed allowing 30cm between rows.
                Transplant pot grown seedlings when large enough to handle to plugs or 24 plants per standard tray.
                Plants directly sown should be thinned.
                Plant to final growing location in firm soil allowing at least 30cm between plants.',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => 'Mar, Apr, May, Oct, Sep-mid', 'harvest' => 'Jun, Jul, Aug, Sep, Oct', 'store' => '',
            ],
            [
                'name' => 'Marketmore 76', 'plant_type_id' => 8, 'info' => 'This popular and reliable outdoor ridge slicing type cucumber produces straight, dark green fruits with white spines, growing to 20cm. An excellent slicing cucumber!',
                'description' => "Resistant to scab, mosaic virus, downy and powdery mildew, alternaria leaf spot and anthracnose. 
                Type: Half-Hardy Annual
                Temperature Required: 21-25°c
                Time to Germinate: 7-10 Days
                Days to Maturity: 60 - 70 Days
                Position/ Light: Full Sun
                Sow under cover (protected) from Mid spring,
                3-4 seeds 1in deep in a 3in pot in good compost,
                and thin later to the best one or two plants per clump.
                Transplant no later than 3 weeks after seeding as cucumbers have a tap root that can be easily damaged.
                Ensure the weather is warm if planting outside, ensuring a sheltered and sunny position.
                Cucumbers germinate and grow best when summer really gets going or under glass.
                To avoid bitterness, keep plants evenly moist at all times.
                Can be trained on a trellis to save garden space or left to roam.
                Keep them picked and they'll keep producing.",
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Waverex', 'plant_type_id' => 12, 'info' => 'Pea Petit Pois Waverex. Prolific Petite Pois variety producing an abundance of small, very sweet and tender Peas on medium sized plants (45cm).  Delicious and excellent for freezing.',
                'description' => 'Plant where peas have not been grown for 2 seasons, digging in well rotted organic matter.
                Sow Mar - Jun 2” deep in 6” wide rows 2 inches apart.
                The distance between the rows should equal the expected height of the variety.
                Avoid sowing during any cold or very wet periods
                Protect immediately from birds.
                Keep weed free.
                Provide support by 3 inches tall.
                Pick regularly to maintain yields.',
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
                'name' => 'Growie', 'plant_type_id' => 14, 'info' => 'A popular purple skinned variety with good flesh colour and texture.  Offers excellent disease resistance to Powdery Mildew and Club Root.  Stands well for cropping Oct - Jan and stores well in dry conditions.',
                'description' => 'Sow Apr - Jun thinly 1cm deep with 45 cm between rows
                Best results generally from a May sowing. Swedes do best in well dug soils which have not been recently manured
                As seedlings develop, gradually thin them until about 20cm apart. Do not transplant.
                Keep soil moist until seedlings are established.
                Very hardy and will withstand frost. Lift as required or all together for storage in dry sand until needed.',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Outdoor Girl', 'plant_type_id' => 15, 'info' => 'An early-maturing with good flavour, reliably producing a good harvest of medium-sized fruit around billiard ball size. Ideal for growing outdoors in the UK climate, but will grow under glass. (Indeterminate)',
                'description' => 'RHS Award of Garden Merit (AGM).
                Sow in spring 1/16 inch deep.  Germination takes around 6-14 days at 65-75F.
                Transplant the seedlings when large enough to handle into 3 inch pots.
                Grow on under cooler conditions and when about 8 inches tall, gradually acclimatise them to outdoor conditions and plant out 18 inches apart in a warm and sunny spot in moist, fertile well drained soil and keep watered.',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Green Bush', 'plant_type_id' => 16, 'info' => 'Courgette Green Bush. A popular and reliable variety delivering an abundance all season of uniform shaped fruits on compact plants.',
                'description' => 'Type:  Half-Hardy Annual
                Time to Germinate: 3-10 Days
                Temperature Required: 18°c +
                Days to Maturity: 50-60 Days
                Light: Full Sun
                A sunny spot protected from strong winds is essential.
                The soil should be well drained and rich in humus, the more the better.
                For an early start (late Mar) place a single seed edgeways 1/2inch deep in seed compost in a 3inch pot. The critical part is temperature, these need at least 65F continuous soil temperature (preferably more to maximise germination rates) until germinated.
                Keep the soil moist - water copiously around the plants, not over them.
                Keep weed free to allow air circulation.
                Once the plants start to fruit, feed every 14 days with a tomato type fertilizer, these are greedy plants.',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Field Bean tips', 'plant_type_id' => 9, 'info' => 'info',
                'description' => 'An amazing winter and spring green.  Plant every 4-6 inches as a green manure and just keep harvesting the new shoots, try to leave two shoot to grow on.  New shoots will spring up from the base to be harvested a few weeks later.  Grows well at the time when all of the other spinach alternatives are slowing down, stopped or dead.  ',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => true, 'multi' => 1, 'spacing' => 8,
                'sowing' => 'Sep-mid, Oct', 'harvest' => 'Nov, Dec, Feb, Mar, Apr', 'store' => '',
            ],
            [
                'name' => 'Chives Cipollina', 'plant_type_id' => 17, 'info' => 'Narrow, grass-like leaves giving a  mild onion-like flavour.  A bulb spreads and forms clumps of tubular leaves 12-18 inches high and is also very decorative in full bloom with ball-shaped lavender-pink flowers.',
                'description' => 'Leaves are ideal to use for flavouring salads, eggs, potatoes, cheese dips, casseroles, soups or stews. Young flower blossoms can be used as edible garnish. Cut leaves quickly grow back. Freezes well in airtight containers or plastic bags. Easy to grow.
                Cultivation Advice Herbs Chives Cipollina
                Days To Germination: 10-14
                Planting Depth:   1/4 inch
                Spacing, Plant:  18 inches
                Light:  Warm Sunny Location
                Sow thinly in pots / trays indoors from Mar for the earliest start covering with ¼ inch of fine compost. Keep soil moderately moist during germination.
                Can be sown outdoors after all danger of frost has passed through to Sep.
                When seedlings are about 2 inches high, thin to 12-18 inches apart. Carefully replant thinned seedlings.
                Can be harvested continuously once mature. For best flavour and texture harvest prior to flowering.
                Snip leaves at the base of the plant to encourage growth.  Leaves can also be dried for later use.
                Plants can also be grown indoors on a windowsill during the winter months.',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Greyhound', 'plant_type_id' => 4, 'info' => 'Early variety, excellent flavour. The compact, pointed heads are produced quickly with few wasteful outer leaves so it can be grown more densely than other varieties.  Can be sown up until late July to produce a crop for cutting in October.',
                'description' => 'Days to Germination: 10-15
                Days To Maturity:  65
                Planting Depth: 1/8″
                Spacing, Row: 18 inches
                Spacing, Plant: 14-18 inches
                Light: Sunny Location
                Start seed indoors or in greenhouse in early spring (5-7 weeks before planting outdoors).
                Or plant directly outdoors in mid spring or early summer when last frost has passed.
                Sow 2-3 seeds together every 18 inches. Planting depth 1/8 inch.
                When seedlings are 1 inch tall thin to one plant every 18 inches.
                Can be sown again in early summer for an autumn crop
                Plant cabbage in a sunny location where no cabbage was grown the year before. Keep weed free, moist and protect against pests.',
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Jalepeno hot pepper', 'plant_type_id' => 20, 'info' => 'info',
                'description' => "Moderate heat.  Jalapeño peppers are a staple food in Mexico and the American Southwest. These steady producers may take a little while to flower, but once they start they keep on producing throughout the growing season. The plants grow to about 3ft in height and produce blunt-ended fruits with thick, dark green skins that turn to bright red when fully ripe.  The flavour deepens as the peppers ripen and both colours have their classic uses. The green peppers are most often used for roasting, stuffing, pickling and salsas. The gorgeous red peppers are often mesquite-smoked into chipotle, strung on ristras for easy access, or dried and made into a hot chile powder.  Like most peppers, jalapeño's are self-pollinating—they're not dependent on insects for fertility, just a little bit of wind.",
                'days2maturity' => 99, 'height' => 1.0, 'spread' => 0.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18,
                'sowing' => 'Jan, Feb, Mar', 'harvest' => 'Jul, Aug, Sep, Oct', 'store' => '',
            ],
            [
                'name' => 'Red Brunswick', 'plant_type_id' => 21, 'info' => 'A reliable late maturing variety with semi flat medium to large dark red bulbs, medium to large in size with excellent mild but pungent flavour.They are very decorative when sliced across the bulb to reveal white and red rings.',
                'description' => 'The flavour is mild and sweet and the bulbs store extremely well into winter.
                Start in early spring indoors / heated greenhouse 8-10 weeks before transplanting outdoors.
                When transplanting, clip plants to three inches and plant 2 inches deep.
                Can be sown directly when ground has warmed in mid-late spring, at 2-3 seeds per inch, however bulbs may struggle to mature in poor summers.
                Thin to 5 inches apart when plants are 6 inches tall.
                Harvest young for salads or when mature as tops are brown and dry.
                Fertile, moist soil enriched with compost is best for onion production.
                Onions are claimed to ward off many insect pests around lettuce, cabbage and carrots.',
                'days2maturity' => 99, 'height' => 0.5, 'spread' => 0.5,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 1,
                'sowing' => 'Feb, Mar, Apr', 'harvest' => 'Aug, Sep', 'store' => '',
            ],
            [
                'name' => 'Gourmet Salad Mix', 'plant_type_id' => 18, 'info' => 'organic seeds',
                'description' => "Fast growing blend of 6 different loose-leaf cutting lettuce varieties. A special blend of light green, dark green, and red lettuce of different textures and shaped leaves. Perfect grown as baby leaves, giving up to four 'cuts', or equally good grown out as more mature leaf lettuces. 45-50 days.",
                'days2maturity' => 99, 'height' => 9.9, 'spread' => 9.9,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 10,
                'sowing' => '', 'harvest' => '', 'store' => '',
            ],
            [
                'name' => 'Summer Purple Sprouting', 'plant_type_id' => 3, 'info' => 'British breeding especially for summer cropping as needs no vernalisation (winter chill) to produce tasty purple spears. Crops from July to November if sown at regular intervals.  Sow seeds at intervals from March to June.',
                'description' => 'British breeding especially for summer cropping as needs no vernalisation (winter chill) to produce tasty purple spears. Robust plants will produce high yields if picked regularly to promote fresh flushes of spears. Broccoli Summer Purple has good heat tolerance. Crops from July to November if sown at regular intervals.  Sow seeds at intervals from March to June. Sow thinly in a well-prepared seedbed, 12mm deep. Keep watered during dry weather.  Transplant seedlings when large enough to handle, about 5 weeks from sowing, allowing a minimum of 6cm (2ft) between plants in the row and 75cm (3in) between rows. Firm in well and keep watered until established. Net against pigeons and cabbage caterpi  Pick regularly to promote fresh flushes of spears.
                Sow in a well prepared seed bed from March to June at a 8-10 mm depth of 13 mm (½”). Can be started under glass in trays.
                Transplant to their final positions around 5 weeks later when the seedlings are large enough to handle and have four or five leaves.
                Growing position should ideally be sheltered with firm soil with organic matter added over winter.
                Plants when young all the way to maturity benefit from netting, especially if pigeons are present in your area. Protect from birds and other pests.',
                'days2maturity' => 99, 'height' => 1.0, 'spread' => 0.6,
                'sow_direct' => false, 'multi' => 1, 'spacing' => 18,
                'sowing' => 'Mar', 'harvest' => 'May, Jun, Jul, Aug', 'store' => '',
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

        foreach ($varieties as $key => $value) {
            Variety::create($value);
        }
    }
}
