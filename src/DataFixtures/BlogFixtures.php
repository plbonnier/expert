<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class BlogFixtures extends Fixture
{
    public const ARTICLES = [
        [
            'titre' => 'Les secrets de la bague en or sertie d\'un diamant',
            'article' => 'La bague en or sertie d\'un diamant est bien plus qu\'un simple bijou; 
            elle incarne l\'élégance intemporelle et la sophistication. 
            Chaque détail de cette pièce exquise raconte une histoire de beauté et de luxe. 
            Voici quelques éléments qui font de cette bague un véritable trésor :\n\n1. 
            L\'or : L\'or est un métal précieux qui symbolise la richesse et la prospérité depuis des millénaires. 
            La bague en or offre une brillance incomparable et une durabilité qui en font un 
            choix populaire pour les bijoux de qualité.\n\n2. 
            Le diamant : Le diamant, souvent appelé « roi des gemmes », est la pierre précieuse 
            la plus prisée au monde. 
            Sa pureté et son éclat inégalés en font le choix parfait pour orner une bague en or. 
            Chaque diamant est unique, et sa brillance captivante ajoute une touche de magie à 
            la bague.\n\n3. Le design : Le design de la bague en or sertie 
            d\'un diamant est crucial pour mettre en valeur la beauté de la pierre précieuse. 
            Des artisans talentueux travaillent avec 
            précision pour créer des motifs et des montures qui mettent en valeur la brillance 
            du diamant tout en assurant sa sécurité.\n\n4. La signification : 
            Au-delà de sa beauté esthétique, la bague en or sertie d\'un diamant peut avoir une 
            signification émotionnelle profonde. 
            Elle est souvent offerte en symbole d\'amour éternel lors d\'engagements ou de mariages, 
            ce qui en fait un héritage précieux à transmettre de génération en génération.\n\n5. 
            L\'entretien : Pour préserver sa beauté et son éclat, la bague en or sertie d\'un 
            diamant nécessite un entretien régulier. 
            Un nettoyage doux et périodique permet de conserver sa brillance originale et de prévenir 
            l\'accumulation de saleté ou de résidus.
            \n\nEn somme, la bague en or sertie d\'un diamant est bien plus qu\'un simple accessoire de mode;
            elle est le symbole ultime de l\'amour, du luxe et de l\'élégance.',
            'photo' => 'bague_diamant.jpg',
            'description' => 'bague diamant avec de l\or',
            'lienVideo' => 'https://www.youtube.com/watch?v=rMMdkKXdF_Q&list=RDrMMdkKXdF_Q&start_radio=1',
            'date' => '2024/02/22',
        ],
        [
            'titre' => 'La splendeur des boucles d\'oreille pendantes en émeraude et or',
            'article' => 'Les boucles d\'oreille pendantes en émeraude et or incarnent l\'élégance 
            et la sophistication. 
            Chaque paire de ces bijoux exquis raconte une histoire de luxe et de raffinement. Voici ce qui rend ces 
            boucles d\'oreille si captivantes :\n\n1. 
            Les émeraudes : Les émeraudes sont parmi les pierres précieuses les plus convoitées au monde. 
            Leur couleur vert profond et leur éclat naturel en font des gemmes remarquables. 
            Lorsqu\'elles sont associées à l\'or, elles créent un contraste saisissant qui attire tous 
            les regards.\n\n2. 
            L\'or : L\'or est un métal précieux qui a toujours été associé à la richesse et au prestige. 
            Les boucles d\'oreille en or ajoutent une touche de brillance et de sophistication à n\'importe 
            quelle tenue. 
            La combinaison de l\'or et des émeraudes crée une esthétique intemporelle et luxueuse.\n\n3. 
            Le design : Le design des boucles d\'oreille pendantes en émeraude et or est souvent élaboré 
            avec soin pour mettre en valeur la beauté naturelle des émeraudes. 
            Des motifs complexes et des détails délicats ajoutent une touche de grâce et de féminité à ces bijoux, 
            les rendant parfaits pour toute occasion spéciale.\n\n
            En résumé, les boucles d\'oreille pendantes en émeraude et or sont bien plus que de simples accessoires ; 
            ce sont des œuvres d\'art à part entière qui célèbrent la beauté naturelle et le savoir-faire artisanal.',
            'photo' => 'boucle_oreille_emeraude.jpg',
            'description' => 'boucle d\'oreille en émeraude et or',
            'lienVideo' => 'https://www.youtube.com/watch?v=rMMdkKXdF_Q&list=RDrMMdkKXdF_Q&start_radio=1',
            'date' => '2024/02/23',
        ],
        [
            'titre' => 'Découvrez les étapes fascinantes d\'une expertise de bijoux',
            'article' => 'L\'expertise de bijoux est un processus méticuleux qui révèle les secrets et 
            la valeur cachée des pièces précieuses. 
            Tout commence par une observation minutieuse de chaque détail, des matériaux utilisés à la qualité 
            de la fabrication. 
            Ensuite, les gemmes sont examinées avec une précision chirurgicale pour évaluer leur authenticité, 
            leur pureté et leur taille. 
            Une fois que tous les éléments ont été inspectés individuellement, l\'expert assemble les pièces 
            du puzzle pour déterminer l\'origine, l\'âge et la valeur globale du bijou.',
            'photo' => 'collier_3jpg',
            'description' => 'collier',
            'lienVideo' => 'https://www.youtube.com/watch?v=rMMdkKXdF_Q&list=RDrMMdkKXdF_Q&start_radio=1',
            'date' => '2024/02/21',
        ],
        [
            'titre' => 'Journée d\'expertise le 1er mars 2024',
            'article' => 'J\organise le 1er mars 2024 à la boutique une journée d\'expertise de bijoux.
            Venez nombreux, apportez vos bijoux et laissez-vous surprendre par la valeur 
            cachée de vos pièces précieuses.
            Nous vous porposerons des conseils pour l\'entretien de vos bijoux et des astuces 
            pour les mettre en valeur.
            Et si vous souhaitez les vendre, nous vous ferons une offre de rachat.',
            'photo' => 'logo.png',
            'description' => 'logo',
            'lienVideo' => '',
            'date' => '2024/02/23',
        ],

    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::ARTICLES as $article) {
            $blog = new Blog();
            $blog->setTitre($article['titre']);
            $blog->setArticle($article['article']);
            $blog->setPhoto($article['photo']);
            $blog->setDescription($article['description']);
            $blog->setLienVideo($article['lienVideo']);
            $blog->setDate(new DateTime($article['date']));
            $manager->persist($blog);
        }

        $manager->flush();
    }
}
