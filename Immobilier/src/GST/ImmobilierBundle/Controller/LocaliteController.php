<?php

namespace GST\ImmobilierBundle\Controller;

use GST\ImmobilierBundle\Entity\Localite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Localite controller.
 *
 * @Route("admin/localite")
 */
class LocaliteController extends Controller
{
    /**
     * Lists all localite entities.
     *
     * @Route("/", name="admin_localite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $localites = $em->getRepository('GSTImmobilierBundle:Localite')->findAll();

        return $this->render('localite/index.html.twig', array(
            'localites' => $localites,
        ));
    }

    /**
     * Creates a new localite entity.
     *
     * @Route("/new", name="admin_localite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $localite = new Localite();
        $form = $this->createForm('GST\ImmobilierBundle\Form\LocaliteType', $localite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($localite);
            $em->flush();

            return $this->redirectToRoute('admin_localite_show', array('id' => $localite->getId()));
        }

        return $this->render('localite/localite.html.twig', array(
            'localite' => $localite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a localite entity.
     *
     * @Route("/{id}", name="admin_localite_show")
     * @Method("GET")
     */
    public function showAction(Localite $localite)
    {
        $deleteForm = $this->createDeleteForm($localite);

        return $this->render('localite/show.html.twig', array(
            'localite' => $localite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing localite entity.
     *
     * @Route("/{id}/edit", name="admin_localite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Localite $localite)
    {
        $deleteForm = $this->createDeleteForm($localite);
        $editForm = $this->createForm('GST\ImmobilierBundle\Form\LocaliteType', $localite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_localite_edit', array('id' => $localite->getId()));
        }

        return $this->render('localite/edit.html.twig', array(
            'localite' => $localite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a localite entity.
     *
     * @Route("/{id}", name="admin_localite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Localite $localite)
    {
        $form = $this->createDeleteForm($localite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($localite);
            $em->flush();
        }

        return $this->redirectToRoute('admin_localite_index');
    }

    /**
     * Creates a form to delete a localite entity.
     *
     * @param Localite $localite The localite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Localite $localite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_localite_delete', array('id' => $localite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
