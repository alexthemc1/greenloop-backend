<?php

namespace App\Data;

class Catalog
{
  public static function get(): array
  {
    return [

      [
        'name' => 'Pomme Gala',
        'price' => 2.50,
        'discount_percent' => 10,
        'category' => 'Fruits',
        'weight' => 0.18,
        'description' => 'Pomme croquante et naturellement sucrée, idéale pour une collation saine et équilibrée.',
        'descriptionLong' => 'La pomme Gala séduit par sa chair ferme, juteuse et délicatement sucrée. Récoltée à maturité, elle offre un parfait équilibre entre douceur et fraîcheur. Riche en fibres (environ 10% des apports journaliers) et source naturelle de vitamine C (~8%), elle s’intègre parfaitement dans une alimentation saine au quotidien.',
        'origin' => 'Cultivée dans des vergers belges selon des pratiques raisonnées, favorisant la qualité du fruit et le respect de l’environnement.',
        'taste' => 'Texture croquante, goût sucré dominant avec une légère pointe acidulée en fin de bouche.',
        'usageAdvice' => 'À déguster nature pour profiter de ses bienfaits, idéale en salade de fruits, en pâtisserie ou en compote sans sucres ajoutés.',
        'conservation' => 'À conserver au réfrigérateur pour préserver son croquant et ses qualités nutritionnelles jusqu’à plusieurs semaines.',
        'icons' => ['Fibres', 'Vitamine C']
      ],

      [
        'name' => 'Banane',
        'price' => 1.80,
        'discount_percent' => 15,
        'category' => 'Fruits',
        'weight' => 0.22,
        'description' => 'Fruit énergétique riche en potassium, parfait pour un regain naturel d’énergie.',
        'descriptionLong' => 'La banane est un fruit incontournable pour les sportifs et les amateurs de collations saines. Naturellement riche en glucides et en potassium (environ 15% des apports journaliers), elle contribue au bon fonctionnement musculaire et à la réduction de la fatigue. Sa texture fondante et son goût sucré en font un allié gourmand et nutritif.',
        'origin' => 'Issue de plantations tropicales certifiées, cultivée dans le respect des normes environnementales et sociales.',
        'taste' => 'Chair douce, fondante et sucrée, avec une texture onctueuse très agréable.',
        'usageAdvice' => 'Idéale en collation, en smoothie, en porridge ou en pâtisserie (banana bread, pancakes).',
        'conservation' => 'À conserver à température ambiante. Peut être réfrigérée une fois mûre pour ralentir son évolution.',
        'icons' => ['Énergie naturelle', 'Fibres']
      ],

      [
        'name' => 'Orange',
        'price' => 2.20,
        'category' => 'Fruits',
        'weight' => 0.25,
        'description' => 'Agrume juteux et rafraîchissant, riche en vitamine C.',
        'descriptionLong' => 'Gorgée de soleil, l’orange est reconnue pour sa richesse en vitamine C (jusqu’à 60% des apports journaliers pour une orange). Elle contribue au bon fonctionnement du système immunitaire tout en offrant une hydratation naturelle grâce à sa forte teneur en eau.',
        'origin' => 'Cultivée dans les régions méditerranéennes bénéficiant d’un ensoleillement optimal.',
        'taste' => 'Saveur équilibrée entre douceur et acidité, très juteuse et désaltérante.',
        'usageAdvice' => 'À consommer nature, en jus frais ou intégrée dans des salades sucrées-salées.',
        'conservation' => 'Se conserve à température ambiante ou au réfrigérateur pour prolonger sa fraîcheur.',
        'icons' => ['Vitamine C', 'Hydratation']
      ],

      [
        'name' => 'Poire',
        'price' => 2.10,
        'category' => 'Fruits',
        'weight' => 0.20,
        'description' => 'Fruit doux et fondant, idéal pour une pause gourmande.',
        'descriptionLong' => 'La poire se distingue par sa chair juteuse et fondante, riche en fibres (environ 12% des besoins quotidiens). Elle favorise une bonne digestion tout en offrant une douceur naturelle très appréciée.',
        'origin' => 'Cultivée dans des vergers européens sélectionnés pour leur savoir-faire.',
        'taste' => 'Très douce, légèrement florale avec une texture fondante.',
        'usageAdvice' => 'Parfaite nature, pochée, en dessert ou accompagnée de fromages.',
        'conservation' => 'À conserver au frais une fois mûre pour prolonger sa durée de vie.',
        'icons' => ['Fibres']
      ],

      [
        'name' => 'Raisin noir',
        'price' => 3.50,
        'category' => 'Fruits',
        'weight' => 0.30,
        'description' => 'Petits fruits sucrés riches en antioxydants naturels.',
        'descriptionLong' => 'Le raisin noir est reconnu pour sa richesse en polyphénols et antioxydants, contribuant à la protection des cellules. Sa peau fine et sa chair juteuse en font un fruit à la fois gourmand et bénéfique pour la santé.',
        'origin' => 'Cultivé dans des régions ensoleillées favorisant une maturation optimale.',
        'taste' => 'Très sucré avec une légère note tannique caractéristique.',
        'usageAdvice' => 'À consommer frais, en dessert ou en accompagnement de plateaux de fromages.',
        'conservation' => 'À conserver au réfrigérateur, non lavé, pour préserver sa fraîcheur.',
        'icons' => ['Antioxydants']
      ],

      [
        'name' => 'Fraise',
        'price' => 4.00,
        'category' => 'Fruits',
        'weight' => 0.25,
        'description' => 'Fruit rouge gourmand, sucré et intensément parfumé.',
        'descriptionLong' => 'Les fraises sont riches en vitamine C (jusqu’à 70% des apports journaliers) et en antioxydants. Récoltées à maturité, elles offrent une saveur intense et une texture fondante.',
        'origin' => 'Cultivées localement en saison pour garantir fraîcheur et qualité gustative.',
        'taste' => 'Très sucrée, légèrement acidulée et extrêmement parfumée.',
        'usageAdvice' => 'À déguster nature, avec un peu de sucre, en dessert ou en pâtisserie.',
        'conservation' => 'À consommer rapidement après achat, produit fragile.',
        'icons' => ['Vitamine C', 'Antioxydants']
      ],

      [
        'name' => 'Kiwi',
        'price' => 3.20,
        'category' => 'Fruits',
        'weight' => 0.18,
        'description' => 'Fruit acidulé très riche en vitamine C.',
        'descriptionLong' => 'Le kiwi est l’un des fruits les plus riches en vitamine C, couvrant jusqu’à 90% des besoins quotidiens. Il est également source de fibres et favorise une bonne digestion.',
        'origin' => 'Cultivé en climat tempéré, dans des vergers spécialisés.',
        'taste' => 'Acidulé avec une touche sucrée, très rafraîchissant.',
        'usageAdvice' => 'À déguster à la cuillère, en salade de fruits ou en smoothie.',
        'conservation' => 'À température ambiante pour mûrir, puis au frais.',
        'icons' => ['Vitamine C']
      ],

      [
        'name' => 'Mangue',
        'price' => 3.80,
        'category' => 'Fruits',
        'weight' => 0.35,
        'description' => 'Fruit exotique sucré, juteux et parfumé.',
        'descriptionLong' => 'La mangue est riche en vitamines A et C (environ 40% des apports journaliers combinés), contribuant à la santé de la peau et du système immunitaire. Sa chair fondante et parfumée en fait un fruit très apprécié.',
        'origin' => 'Cultivée dans les régions tropicales, récoltée à maturité pour une qualité optimale.',
        'taste' => 'Très sucrée, fondante avec des notes exotiques intenses.',
        'usageAdvice' => 'À consommer nature, en smoothie, en salade ou en dessert.',
        'conservation' => 'À température ambiante jusqu’à maturité.',
        'icons' => ['Énergie naturelle']
      ],

      [
        'name' => 'Ananas',
        'price' => 5.45,
        'category' => 'Fruits',
        'weight' => 1.20,
        'description' => 'Fruit tropical riche en enzymes digestives.',
        'descriptionLong' => 'Juteux, parfumé et naturellement sucré, l’ananas Extra Sweet est récolté à maturité pour offrir une chair fondante et rafraîchissante. Idéal à déguster nature, en jus ou en cuisine, il apporte une touche exotique et ensoleillée à vos recettes du quotidien.',
        'origin' => 'Notre ananas Extra Sweet est cultivé sous des climats tropicaux favorables, où il mûrit naturellement au soleil. Récolté à pleine maturité, il est sélectionné pour sa chair tendre, son équilibre parfait entre douceur et acidité, et son parfum intense.',
        'taste' => 'Sa chair jaune vif est particulièrement juteuse, fondante et peu fibreuse. Son goût naturellement sucré en fait un fruit apprécié aussi bien cru que cuisiné.',
        'usageAdvice' => 'À déguster frais, en tranches ou en dés Idéal pour les jus, smoothies et salades de fruits Parfait en cuisine : plats sucrés-salés, desserts, carpaccios de fruits',
        'conservation' => 'À conserver à température ambiante pendant quelques jours. Une fois découpé, placer au réfrigérateur dans un récipient hermétique et consommer dans les 2 à 3 jours.',
        'icons' => ['Digestion facile']
      ],

      [
        'name' => 'Citron',
        'price' => 1.50,
        'category' => 'Fruits',
        'weight' => 0.12,
        'description' => 'Agrume acidulé, indispensable en cuisine.',
        'descriptionLong' => 'Le citron est extrêmement riche en vitamine C (environ 50% des besoins journaliers) et reconnu pour ses propriétés détoxifiantes et digestives. Il apporte fraîcheur et vivacité à toutes vos préparations.',
        'origin' => 'Cultivé sous climat méditerranéen ensoleillé.',
        'taste' => 'Très acidulé, frais et intense.',
        'usageAdvice' => 'Idéal pour assaisonner, en jus, ou pour relever plats et desserts.',
        'conservation' => 'À température ambiante ou au réfrigérateur.',
        'icons' => ['Vitamine C']
      ],

      [
        'name' => 'Melon',
        'price' => 5.00,
        'category' => 'Fruits',
        'weight' => 1.50,
        'description' => 'Fruit estival très hydratant et sucré.',
        'descriptionLong' => 'Composé à plus de 90% d’eau, le melon est idéal pour l’hydratation. Il est également riche en bêta-carotène et vitamines, contribuant à une peau éclatante.',
        'origin' => 'Cultivé dans des régions chaudes favorisant une maturation optimale.',
        'taste' => 'Très sucré, juteux et rafraîchissant.',
        'usageAdvice' => 'À déguster frais, en entrée, dessert ou salade.',
        'conservation' => 'À conserver au frais après découpe.',
        'icons' => ['Hydratation']
      ],

      [
        'name' => 'Pêche',
        'price' => 2.90,
        'category' => 'Fruits',
        'weight' => 0.20,
        'description' => 'Fruit estival juteux et délicatement sucré.',
        'descriptionLong' => 'La pêche est riche en eau et en fibres, idéale pour une alimentation légère. Elle apporte fraîcheur et douceur tout en étant peu calorique.',
        'origin' => 'Cultivée dans des vergers européens ensoleillés.',
        'taste' => 'Doux, juteux avec une texture fondante.',
        'usageAdvice' => 'À consommer nature, en salade ou en dessert.',
        'conservation' => 'À température ambiante puis au frais une fois mûre.',
        'icons' => ['Fibres']
      ],

           [
        'name' => 'Carotte',
        'price' => 1.20,
        'category' => 'Légumes',
        'weight' => 0.12,
        'description' => 'Légume racine croquant, naturellement sucré et riche en bêta-carotène.',
        'descriptionLong' => 'La carotte est reconnue pour sa richesse en bêta-carotène (provitamine A), couvrant jusqu’à 200% des apports journaliers pour 100g. Elle contribue à la santé de la peau et de la vision tout en offrant une texture croquante et une saveur douce très appréciée.',
        'origin' => 'Cultivée en Belgique et en France selon des pratiques agricoles raisonnées.',
        'taste' => 'Douce, légèrement sucrée, avec une texture croquante lorsqu’elle est consommée crue.',
        'usageAdvice' => 'À déguster crue en bâtonnets ou râpée, cuite en soupe, purée ou accompagnement.',
        'conservation' => 'À conserver au réfrigérateur dans le bac à légumes pour préserver sa fraîcheur.',
        'icons' => ['Antioxydants', 'Faible en calories']
      ],

      [
        'name' => 'Tomate',
        'price' => 2.00,
        'category' => 'Légumes',
        'weight' => 0.20,
        'description' => 'Légume-fruit juteux, riche en lycopène et en saveurs estivales.',
        'descriptionLong' => 'La tomate est une excellente source de lycopène, un puissant antioxydant contribuant à la protection cellulaire. Elle contient également environ 20% des apports journaliers en vitamine C, tout en étant très faible en calories.',
        'origin' => 'Cultivée en Europe, sous serre ou en plein champ selon la saison.',
        'taste' => 'Juteuse, légèrement acidulée avec une touche sucrée selon la maturité.',
        'usageAdvice' => 'Idéale en salade, en sauce, rôtie au four ou en accompagnement.',
        'conservation' => 'À conserver à température ambiante pour préserver ses arômes.',
        'icons' => ['Antioxydants']
      ],

      [
        'name' => 'Courgette',
        'price' => 1.80,
        'category' => 'Légumes',
        'weight' => 0.25,
        'description' => 'Légume léger, digeste et polyvalent en cuisine.',
        'descriptionLong' => 'Composée à plus de 90% d’eau, la courgette est particulièrement hydratante et faible en calories. Elle apporte également des vitamines et minéraux essentiels, tout en étant facile à intégrer dans de nombreuses recettes.',
        'origin' => 'Production locale et européenne selon la saison.',
        'taste' => 'Saveur douce et délicate, légèrement végétale.',
        'usageAdvice' => 'À cuisiner sautée, grillée, en gratin, soupe ou même crue en fines lamelles.',
        'conservation' => 'À conserver au réfrigérateur dans le bac à légumes.',
        'icons' => ['Faible en calories']
      ],

      [
        'name' => 'Brocoli',
        'price' => 2.50,
        'category' => 'Légumes',
        'weight' => 0.30,
        'description' => 'Légume vert très nutritif, riche en fibres et vitamines.',
        'descriptionLong' => 'Le brocoli est une véritable source de nutriments, riche en vitamine C (jusqu’à 80% des apports journaliers) et en fibres. Il est également reconnu pour ses composés antioxydants bénéfiques pour la santé.',
        'origin' => 'Cultivé en Europe dans des conditions climatiques adaptées.',
        'taste' => 'Saveur légèrement amère et végétale, avec une texture tendre après cuisson.',
        'usageAdvice' => 'À cuire à la vapeur, sauté ou intégré dans des plats chauds et salades.',
        'conservation' => 'À conserver au frais et consommer rapidement après achat.',
        'icons' => ['Riche en vitamines']
      ],

      [
        'name' => 'Épinard',
        'price' => 2.30,
        'category' => 'Légumes',
        'weight' => 0.20,
        'description' => 'Feuilles vertes riches en minéraux et nutriments essentiels.',
        'descriptionLong' => 'Les épinards sont riches en fer, magnésium et vitamine K, contribuant à la vitalité et à la santé osseuse. Ils apportent également des antioxydants tout en restant faibles en calories.',
        'origin' => 'Cultivés localement pour garantir fraîcheur et qualité.',
        'taste' => 'Saveur végétale douce avec une légère note terreuse.',
        'usageAdvice' => 'À consommer crus en salade ou cuits en accompagnement, quiches ou smoothies.',
        'conservation' => 'Produit fragile, à conserver au frais et consommer rapidement.',
        'icons' => ['Minéraux']
      ],

      [
        'name' => 'Poivron rouge',
        'price' => 2.80,
        'category' => 'Légumes',
        'weight' => 0.22,
        'description' => 'Légume croquant et sucré, extrêmement riche en vitamine C.',
        'descriptionLong' => 'Le poivron rouge contient jusqu’à 150% des apports journaliers en vitamine C, surpassant de nombreux fruits. Il est également riche en antioxydants et apporte couleur et douceur aux plats.',
        'origin' => 'Cultivé sous climat ensoleillé, principalement en région méditerranéenne.',
        'taste' => 'Très doux, légèrement sucré et croquant.',
        'usageAdvice' => 'À consommer cru en salade, grillé, rôti ou sauté.',
        'conservation' => 'À conserver au réfrigérateur.',
        'icons' => ['Vitamine C']
      ],

      [
        'name' => 'Concombre',
        'price' => 1.70,
        'category' => 'Légumes',
        'weight' => 0.30,
        'description' => 'Légume très frais et hydratant, idéal en été.',
        'descriptionLong' => 'Composé à plus de 95% d’eau, le concombre est parfait pour l’hydratation. Il est faible en calories tout en apportant fraîcheur et légèreté à l’alimentation.',
        'origin' => 'Cultivé en serre ou en plein champ selon la saison.',
        'taste' => 'Très frais, croquant et légèrement végétal.',
        'usageAdvice' => 'À consommer cru en salade, en jus ou en accompagnement.',
        'conservation' => 'À conserver au réfrigérateur.',
        'icons' => ['Hydratation']
      ],

      [
        'name' => 'Oignon',
        'price' => 1.10,
        'category' => 'Légumes',
        'weight' => 0.15,
        'description' => 'Ingrédient de base, riche en composés aromatiques.',
        'descriptionLong' => 'L’oignon est un incontournable de la cuisine, riche en composés soufrés et antioxydants. Il contribue à relever les plats tout en apportant des bienfaits nutritionnels.',
        'origin' => 'Cultivé en Europe dans des conditions adaptées.',
        'taste' => 'Goût prononcé, légèrement sucré après cuisson.',
        'usageAdvice' => 'À utiliser dans les sauces, plats mijotés, soupes ou poêlées.',
        'conservation' => 'À conserver dans un endroit sec, frais et ventilé.',
        'icons' => ['Minéraux']
      ],

      [
        'name' => 'Aubergine',
        'price' => 2.40,
        'category' => 'Légumes',
        'weight' => 0.40,
        'description' => 'Légume méditerranéen à chair tendre, idéal pour les plats ensoleillés.',
        'descriptionLong' => 'L’aubergine est riche en fibres et faible en calories. Elle absorbe parfaitement les saveurs en cuisson, ce qui en fait un ingrédient clé de nombreuses recettes méditerranéennes.',
        'origin' => 'Cultivée dans les régions chaudes et ensoleillées.',
        'taste' => 'Doux avec une légère amertume, texture fondante après cuisson.',
        'usageAdvice' => 'À griller, rôtir, mijoter ou intégrer dans des plats comme la ratatouille.',
        'conservation' => 'À conserver au réfrigérateur.',
        'icons' => ['Fibres']
      ],

      [
        'name' => 'Chou-fleur',
        'price' => 2.60,
        'category' => 'Légumes',
        'weight' => 0.80,
        'description' => 'Légume riche en fibres, polyvalent et léger.',
        'descriptionLong' => 'Le chou-fleur est riche en fibres et en vitamine C (environ 70% des apports journaliers). Il est très polyvalent et peut remplacer certains féculents dans une alimentation équilibrée.',
        'origin' => 'Cultivé en Europe dans des conditions tempérées.',
        'taste' => 'Saveur douce et légèrement noisettée.',
        'usageAdvice' => 'À cuire vapeur, rôtir, en purée ou en alternative au riz.',
        'conservation' => 'À conserver au réfrigérateur.',
        'icons' => ['Fibres']
      ],

      [
        'name' => 'Laitue',
        'price' => 1.50,
        'category' => 'Légumes',
        'weight' => 0.25,
        'description' => 'Feuilles fraîches et croquantes, base idéale pour les salades.',
        'descriptionLong' => 'La laitue est composée majoritairement d’eau (plus de 90%), ce qui la rend très légère et hydratante. Elle apporte fraîcheur et croquant tout en étant très faible en calories.',
        'origin' => 'Cultivée localement pour garantir fraîcheur maximale.',
        'taste' => 'Très doux et légèrement végétal.',
        'usageAdvice' => 'À consommer en salade ou en accompagnement de plats froids.',
        'conservation' => 'Produit fragile, à conserver au frais et consommer rapidement.',
        'icons' => ['Faible en calories']
      ],

      [
        'name' => 'Patate douce',
        'price' => 2.90,
        'category' => 'Légumes',
        'weight' => 0.50,
        'description' => 'Tubercule nourrissant, naturellement sucré et énergétique.',
        'descriptionLong' => 'La patate douce est riche en glucides complexes et en bêta-carotène (jusqu’à 300% des apports journaliers). Elle constitue une excellente source d’énergie durable.',
        'origin' => 'Cultivée dans des zones tropicales et subtropicales.',
        'taste' => 'Saveur sucrée avec une texture fondante.',
        'usageAdvice' => 'À rôtir, cuire en purée, en frites ou en soupe.',
        'conservation' => 'À conserver dans un endroit sec, à l’abri de la lumière.',
        'icons' => ['Énergie naturelle']
      ],

      [
        'name' => 'Radis',
        'price' => 1.30,
        'category' => 'Légumes',
        'weight' => 0.10,
        'description' => 'Petit légume croquant et rafraîchissant, légèrement piquant.',
        'descriptionLong' => 'Le radis est faible en calories et riche en eau, ce qui en fait un excellent aliment pour une alimentation légère. Il stimule également la digestion grâce à ses composés naturels.',
        'origin' => 'Cultivé localement pour une fraîcheur optimale.',
        'taste' => 'Croquant, frais avec une pointe de piquant.',
        'usageAdvice' => 'À consommer cru, en salade ou avec un peu de sel.',
        'conservation' => 'À conserver au réfrigérateur avec ses fanes retirées.',
        'icons' => ['Digestion facile']
      ],

      // =====================
      // PANIERS
      // =====================

      [
        'name' => 'Panier bio découverte',
        'price' => 18.00,
        'category' => 'Paniers',
        'weight' => 3,
        'description' => 'Assortiment varié de produits bio pour une alimentation saine.',
        'descriptionLong' => 'Ce panier bio découverte propose une sélection équilibrée de fruits et légumes de saison issus de l’agriculture biologique. Il permet de couvrir une grande partie des besoins nutritionnels hebdomadaires en fibres, vitamines et minéraux.',
        'origin' => 'Produits issus de producteurs locaux certifiés bio.',
        'taste' => 'Saveurs variées selon la saison, toujours fraîches et authentiques.',
        'usageAdvice' => 'Idéal pour une consommation quotidienne équilibrée et diversifiée.',
        'conservation' => 'À conserver au frais et adapter selon les produits.',
        'icons' => ['Équilibre alimentaire']
      ],

      [
        'name' => 'Panier fruits frais',
        'price' => 15.00,
        'category' => 'Paniers',
        'weight' => 2.5,
        'description' => 'Sélection gourmande de fruits frais et de saison.',
        'descriptionLong' => 'Ce panier regroupe une variété de fruits soigneusement sélectionnés pour leur fraîcheur et leur qualité gustative. Il apporte un apport élevé en vitamines, notamment en vitamine C.',
        'origin' => 'Approvisionnement local et européen selon saison.',
        'taste' => 'Sucré, frais et varié.',
        'usageAdvice' => 'Parfait pour les collations, petits-déjeuners et desserts.',
        'conservation' => 'À conserver au frais pour prolonger la fraîcheur.',
        'icons' => ['Vitamine C']
      ],

      [
        'name' => 'Panier légumes du marché',
        'price' => 14.50,
        'category' => 'Paniers',
        'weight' => 3,
        'description' => 'Sélection de légumes frais pour une cuisine du quotidien.',
        'descriptionLong' => 'Ce panier propose des légumes de saison issus du marché, riches en fibres et nutriments essentiels. Il constitue une base idéale pour une cuisine saine et équilibrée.',
        'origin' => 'Agriculture locale et circuits courts.',
        'taste' => 'Saveurs naturelles, authentiques et variées.',
        'usageAdvice' => 'Parfait pour préparer des plats maison variés et équilibrés.',
        'conservation' => 'À conserver au réfrigérateur selon les produits.',
        'icons' => ['Fibres']
      ],
    ];
  }
}
