<?php
/**
 * Created by PhpStorm.
 * User: dmytrobudonnyi
 * Date: 15.06.17
 * Time: 1:49 PM
 */

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use common\models\Lang;
use common\models\Video;
use common\models\Widget;
use yii\data\Pagination;
use Yii;
use yii\helpers\Url;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        //Статистика посещений
//        $this->on(\yii\web\Controller::EVENT_AFTER_ACTION, function ($event) {
//            \common\modules\statistics\CountKsl::init();
//        });

        $catalog = Category::find()->where(['status' => 1])->orderBy(['sort_order' => SORT_ASC])->all();
        $products = Product::find()->where(['status' => 1, 'availability' => 1])->orderBy(['name_ru' => SORT_DESC])->all();

        $lang = Lang::getCurrent()->url;
        $elements = [];
        foreach ($catalog as $item) {
            $elements[] = array(
                "@type" => "ListItem",
                "position" => $item->id,
                "url" => Url::base(true) . "/{$lang}/{$item->url}",
                "name" => htmlentities(strip_tags($item->{'name_' . $lang})),
                "image" => [
                    "@context" => "http://schema.org",
                    "@type" => "ImageObject",
                    "contentUrl" => "https://pandus.info/img/category/$item->image",
                    "description" => htmlentities(strip_tags($item->{'name_' . $lang})),
                    "width" => 554,
                    "height" => 415
                ]
            );
        }

        $lang == 'ru' ?
            $this->setMeta('Пандусы для людей с инвалидностью на коляске купить с доставкой',
                'пандус, купить, инвалид, коляска, телескопический, раскладной, ступени',
                'Пандусы для людей с инвалидностью ✅ Переносные и стационарные ✅ 100% гарантия качества ✅ Всегда в наличии ➜ Обращайтесь! Опыт поставки пандусов с 2015 года.',
                Url::base(true) . '/img/' . 'pandus_sm4.jpg')
            : $this->setMeta('Пандуси для людей з інвалідністю на колясці купити з доставкою',
            'пандус, купити, інвалід, коляска, візок, телескопічний, розкладний, ступені, сходи',
            'Пандуси для людей з інвалідністю ✅ Переносні та стаціонарні ✅ 100% гарантія якості ✅ Завжди в наявності ➜ Звертайтесь! Досвід постачання пандусів з 2015 року.',
            Url::base(true) . '/img/' . 'pandus_sm4.jpg');

        return $this->render('index', compact('catalog', 'products', 'elements'));
    }

    public function actionCountry($country)
    {
        $catalog = Category::find()->where(['country_origyn' => $country, 'status' => 1])->orderBy(['sort_order' => SORT_ASC])->all();

        $lang = Lang::getCurrent()->url;
        $elements = [];
        foreach ($catalog as $item) {
            $elements[] = array(
                "@type" => "ListItem",
                "position" => $item->id,
                "url" => Url::base(true) . "/{$lang}/{$item->url}",
                "name" => htmlentities(strip_tags($item->{'name_' . $lang})),
                "image" => [
                    "@context" => "http://schema.org",
                    "@type" => "ImageObject",
                    "contentUrl" => "https://pandus.info/img/category/$item->image",
                    "description" => htmlentities(strip_tags($item->{'name_' . $lang})),
                    "width" => 554,
                    "height" => 415
                ]
            );
        }

        Lang::getCurrent()->url == 'ru' ?
            $this->setMeta('Пандусы для инвалида в коляске производства ' . $country . ' купить с доставкой',
                'пандус, купить, инвалид, коляска, телескопический, раскладной, переносной',
                'Пандусы для людей с инвалидностью ✅ Переносные и стационарные ✅ 100% гарантия качества ✅ Всегда в наличии. Производства ' . $country . '. Опыт поставки пандусов с 2015 года.',
                Url::base(true) . '/img/' . 'pandus_sm4.jpg')
            : $this->setMeta('Пандуси для інвалідів у візку виробництва' . $country . ' купити з доставкою',
                 'пандус, купити, інвалід, візок, телескопічний, розкладний, переносний',
                 'Пандуси для людей з інвалідністю ✅ Переносні та стаціонарні ✅ 100% гарантія якості ✅ Завжди в наявності. Виробництва '. $country . '. Досвід постачання пандусів з 2015 року.',
            Url::base(true) . '/img/' . 'pandus_sm4.jpg');

        return $this->render('index', compact('catalog', 'country', 'elements'));
    }

    public function actionTypes($type)
    {
        $typeArray = [
            'rozdilni' => ['telescopic-ramps', 'fixed-ramps', 'foldable-telescopic-ramps', 'tailboard-ramps', 'pandus-ukraine-pr', 'pandus-ukraine-pp', 'loading-ramps', 'pandus-shyrokyi-rozkladnyi', 'loading-rtails'],
            'sucilni' => ['iramps', 'anyramps', 'carbon-ramps', 'pandus-shirokiy-psh', 'pandus-ukraine-prp'],
            'avtomobilni' => ['two-part-ramps', 'three-part-ramps', 'commercial-ramps']
        ];

        $forSeoRu = [
            'rozdilni' => 'раздельные',
            'sucilni' => 'сплошные',
            'avtomobilni' => 'автомобильные'
        ];
        $forSeoUa = [
            'rozdilni' => 'роздільні',
            'sucilni' => 'суцільні',
            'avtomobilni' => 'автомобільні'
        ];

        $catalog = Category::find()->where(['in', 'url', $typeArray[$type]])->andWhere(['status' => 1])->orderBy(['sort_order' => SORT_ASC])->all();

        Lang::getCurrent()->url == 'ru' ? (
        $this->setMeta('Пандусы для коляски ' . ucfirst($forSeoRu[$type]) . '. Для коляски',
            'пандус, купить, инвалид, коляска, преграда, рампа, ступени',
            'Каталог пандусов для инвалида в коляске. ' . ucfirst($forSeoRu[$type]) . ' пандусы. Безопасные и надежные пандусы для людей с инвалидностью в коляске. Опыт работы начиная с 2015 года.',
            Url::base(true) . '/img/pandus_sm4.jpg')) : (
        $this->setMeta('Пандуси для візка коляски ' . ucfirst($forSeoUa[$type]) . '. Для коляски і візку',
            'пандус, коляска, візок, інвалід, інвалідність, людина, рампа, перешкода, сходи',
            'Каталог пандусів для інваліда на візку. ' . ucfirst($forSeoUa[$type]) . ' пандуси. Безпечні та надійні пандуси для людей з інвалідністю на візку. Досвід роботи починаючи з 2015 року.',
            Url::base(true) . '/img/pandus_sm4.jpg'));

        return $this->render('types', compact('catalog', 'type'));
    }

    public function actionCategory($url = null)
    {
        $category = Category::find()->where(['url' => $url])->one();
        $products = Product::find()->where(['category_id' => $category['id']])->andWhere(['status' => 1])->orderBy(['price' => SORT_DESC])->all();

        //error when there are not any categories
        if (empty($category)) {
            throw new \yii\web\HttpException(404, Yii::t("main", 'Такої категорії не існує.'));
        }

        $lang = Lang::getCurrent()->url ?? 'ru';

        $elements = [];
        foreach ($products as $item) {
            $elements[] = array(
                "@type" => "ListItem",
                "position" => $item->id,
                "url" => Url::base(true) . "/{$lang}/{$item->url}.html",
                "name" => htmlentities(strip_tags($item->{'name_' . $lang})),
                "image" => [
                    "@context" => "http://schema.org",
                    "@type" => "ImageObject",
                    "contentUrl" => Url::base(true) . "/img/product/$item->image",
                    "description" => htmlentities(strip_tags($item->{'name_' . $lang})),
                    "width" => 554,
                    "height" => 415
                ]
            );
        }

        $widgets = Widget::find()->where(['in', 'widget_name', explode(', ', $category->widgets)])->all();
        $videos = Video::find()->where(['in', 'video_name', explode(', ', $category->video)])->all();

        $this->setMeta($category->{'meta_title_' . $lang},
            $category->{'meta_keywords_' . $lang},
            $category->{'meta_description_' . $lang},
            Url::base(true) . '/category/' . $category->image);

        return $this->render('category', compact('category', 'url', 'widgets', 'products', 'videos', 'elements'));
    }
}
