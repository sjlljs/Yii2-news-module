�������� � ����� common/modules.

��������� �������� yii migrate --migrationPath=@common/modules/news/migrations
����������� ������:
    'modules' => [
        'news' => [
            'class' => 'common\modules\news\news',
        ],
    ],    

��� ��������� ������������ DefaultController, 'url' => ['/newsview/']
��� ������� ������������ AdminContoller, 'url' => ['news/admin/index']