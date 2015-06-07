Положить в папку common/modules.

Применить миграции yii migrate --migrationPath=@common/modules/news/migrations
Подключение модуля:
    'modules' => [
        'news' => [
            'class' => 'common\modules\news\news',
        ],
    ],    

Для фронтэнда используется DefaultController, 'url' => ['/newsview/']
Для бэкенда используется AdminContoller, 'url' => ['news/admin/index']