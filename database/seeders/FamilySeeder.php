<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $families = [
            ['name' => 'Allium', 'latin' => 'Liliaceae',
                'description' => 'The Liliaceae family includes plants with leaves that are usually vertical and very long, as well as flowers with six colorful petals. These species can be ornamental or medicinal, or can be eaten or used to make textiles. A few examples: garlic, asparagus, chives, shallots, onions, and leeks.'],
            ['name' => 'Beet', 'latin' => 'Chenopodiaceae',
                'description' => 'The Chenopodiaceae family includes plants without petals that often grow in soil rich in salts or nitrates. A few examples: Swiss chard, beets, and spinach.'],
            ['name' => 'Brassica', 'latin' => 'Brassicaceae',
                'description' => 'The Brassicaceae (or Cruciferae) family is characterized by a siliquose fruit and a four-sepaled flower, with four petals in a cross shape and six stamens, including two smaller ones. A few examples: cabbages, watercress, turnips, and radishes.'],
            ['name' => 'Carrot', 'latin' => 'Umbelliferae',
                'description' => 'The Umbelliferae family includes plants whose defining characteristic is the arrangement of their flowers in umbels, hence their name. Some species, such as hemlock, can be poisonous, while others are edible. A few examples: dill, anise, garden angelica, carrots, caraway, celery, chervil, cilantro, cumin, fennel, parsnips, and parsley.'],
            ['name' => 'Curcubit', 'latin' => 'Cucurbitaceae',
                'description' => 'The Cucurbitaceae family includes herbaceous plants (and a few very rare shrubs), usually rampant or else climbing, using spiral tendrils. They live in temperate, hot, and tropical regions. A few examples: pumpkins, squash, cucumbers, and melons.'],
            ['name' => 'Fruit', 'latin' => 'Rosaceae',
                'description' => 'The Rosaceae family includes herbaceous and woody plants with alternate leaves and either simple or composite flowers, usually pinkish in color. A few examples: strawberries, cherries, raspberries, blackberries, pears, apples, and plums.'],
            ['name' => 'Grass', 'latin' => 'Poaceae',
                'description' => 'The Poaceae family, formerly known as Gramineae, includes nearly 12,000 species in over 700 genera. Most plants that we commonly call “grains” belong to this family, but it also includes other species, such as bamboo. A few examples: corn, rice, wheat, barley, oats, rye, and millet.'],
            ['name' => 'Herb', 'latin' => 'Lamiaceae',
                'description' => 'The Lamiaceae family includes plants with leaves containing many small glands that secrete essential oils, making these plants highly fragrant. That is why many are used in herbal teas (mint, lemon balm), jams (mint), cooking (sage, thyme, savory), perfumes (oregano, lavender), and more. A few examples: basil, catnip, hyssop, lavender, marjoram, white horehound, lemon balm, oregano, rosemary, savory, sage, and thyme.'],
            ['name' => 'Legume', 'latin' => 'Fabaceae',
                'description' => 'The Fabaceae family, commonly known as pulses, includes herbaceous plants, shrubs, trees, and vines. This family is present in regions that range from cold to tropical. A few examples: beans, peas, lentils, peanuts, soy, and fava beans.'],
            ['name' => 'Nightshade', 'latin' => 'Solanaceae',
                'description' => 'The Solanaceae family includes herbaceous plants, shrubs, trees, and vines that grow in temperate to tropical regions. A few examples: eggplants, bell peppers, potatoes, tobacco, and tomatoes.'],
            ['name' => 'Salad', 'latin' => 'Asteraceae',
                'description' => 'The Asteraceae (or Compositae) family is very large, including nearly 13,000 species, mostly herbaceous plants but also some trees, shrubs, and vines. A few examples: absinthe, artichokes, chamomile, cardoons, chicory, tarragon, lettuce, dandelions, sunflower, and salsify.'],
            ['name' => 'Arum', 'latin' => 'Araceae', 'description' => 'The arum family is a large family that includes many tropical ornamental flowering plants that have a distinctive shape, including Anthuriums. The edible members of this family include elephant foot yam, taro, and tania.'],
            ['name' => 'Mallow', 'latin' => 'Malvaceae', 'description' => 'Okra is the only member of the mallow family that is considered a vegetable. However, this same family contains other well-known plants, such as hibiscus and cotton, and is thought to have originated from Africa or South Asia. All members of this family prefer warm tropical growing conditions.'],
            ['name' => 'Ginger', 'latin' => 'Zingiberaceae', 'description' => 'This family of plants includes many ornamental, medicinal plants and vegetables that are regarded as spices. These include ginger, turmeric, and cardamon.'],
            ['name' => 'Morning-glory', 'latin' => 'Convolvulaceae', 'description' => 'As you may have guessed, this family includes the ornamental flowering plant, morning-glory, as well as sweet potato, a tuber vegetable that grows well in warm areas.'],
            ['name' => 'Spurge', 'latin' => 'Euphorbias', 'description' => 'Although this is a very large family of plants that includes the well-known Poinsettia. Cassava, also known as manioc, is a tuber vegetable that is the best-known vegetable in this family.'],
        ];

        foreach ($families as $key => $value) {
            Family::create($value);
        }
    }
}
