<?php
namespace Perruque\Controllers;

use Perruque\Classes\Tools;
use function PHPSTORM_META\type;
use Silex\Application;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\Request;
use Perruque\Models\Perruque as PerruqueModel;


class Perruque {

    function display_index(Application $app) {
        $perruqueModel = new PerruqueModel();
        return $app['twig']->render('perruque.twig', ['perruque' => $perruqueModel]);
    }

    function display_admin_index(Application $app) {
        $perruqueModel = new PerruqueModel();
        return $app['twig']->render('admin/perruque_index.twig', ['perruque' => $perruqueModel]);
    }

    function display_admin_create(Application $app, Request $request) {

        $form = $this->get_perruque_form($app);

        // syncroniser le form avec les données $_POST
        $form->handleRequest($request);

        // vérifier si le formulaire à été envoyé
        if ($form->isSubmitted()) {
            $formFields = $form->getData();

            $perruque_model = new PerruqueModel();
            $perruque_model->create(
                $formFields['title'],
                $formFields['description'],
                $formFields['image'],
                floatval($formFields['price']),
                intval($formFields['quantity'])
            );

            return Tools::redirect('admin_perruque');
        }

        return $app['twig']->render('admin/perruque_create.twig', [
            'form' => $form->createView()
        ]);
    }

    function get_perruque_form(Application $app) {
        // déclaration des champs
        return $app['form.factory']->createBuilder(FormType::class)
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'constraints' => [new Assert\Length(array('max' => 64))]
            ])
            ->add('description', TextareaType::class)
            ->add('price', NumberType::class, [
                'label' => 'Prix',
                'required' => false,
                'data' => 0,
                'constraints' => [new Assert\GreaterThanOrEqual(0)]
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantité',
                'required' => false,
                'data' => 0,
                'constraints' => [
                    new Assert\GreaterThanOrEqual(0),
                    new Assert\Type(['type' => "integer"])
                ]
            ])
            ->add('image', FileType::class, [
                'required' => false,
                'label' => 'Image'
            ])
            ->add('enregistrer', SubmitType::class)
            ->getForm();
    }

    function display_admin_delete(Application $app, Request $request) {
        $perruque_id = $request->get('id');
        $perruqueModel = new PerruqueModel();
        $perruqueModel->delete($perruque_id);
        return $app['twig']->render('admin/perruque_index.twig', ['perruque' => $perruqueModel]);
    }

    function display_admin_update(Application $app, Request $request) {
        $form = $this->get_perruque_form($app);
        /*
                $perruqueModel = new PerruqueModel();
                $data = $perruqueModel->get_perruque($request->get('id'));

                // syncroniser avec les données de la base de données
                $form = $form->setData($data)->getForm();

                // syncroniser le form avec les données $_POST
                $form->handleRequest($request);
                if ($form->isSubmitted()) {
                    $formFields = $form->getData();
                }

                // syncroniser le form avec les données $_POST
                //$form->handleRequest($perruqe_infos);
        */
        return $app['twig']->render('admin/perruque_create.twig', [
            'form' => $form->createView()
        ]);
    }

}
