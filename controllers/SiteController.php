<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ValidarForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionHello($get='Hello Dolly')
    {
	    $mensaje = 'Hola Mundo';
	    $numeros = [0, 2, 4, 6];
	    return $this->render(
		    'hello',
		    [
			    "saluda" => $mensaje,
			    "numeros" => $numeros,
			    "get" => $get
		    ]
	    );
    }

    public function actionForm($mensaje=null)
    {
	    return $this->render("formulario",["mensaje" => $mensaje]);
    }

    public function actionValidarform($mensaje=null)
    {
	    $model = new ValidarForm();

	    // qué hacer con el model
	    if ($model->load(Yii::$app->request->post()))
	    {
		    if ($model->validate())
		    {
			    // deberia aca consultar / guardar en base de datos
			    $nombre = $model->nombre;
			    $email = $model->email;
			    $mensaje = "usuario & email: $nombre $email";
		    }
		    else
		    {
			    $model->getErrors();
		    }
	    }

	    return $this->render("validarformulario",["model" => $model, "mensaje" => $mensaje]);
    }

    public function actionProcesar_form()
    {
	    $mensaje=null;
	    if (isset($_REQUEST['nombre']))
	    {
		    $nombre=filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
		    $mensaje = "Su nombre es: $nombre";
	    }

	    $this->redirect(["site/form", "mensaje"=>$mensaje]);

    }
}
