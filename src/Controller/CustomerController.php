<?php

namespace App\Controller;

use App\Entity\Customer;

use App\Form\CustomerType;
use App\Repository\CustomerRepository;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CustomerStatusRepository;
use App\Repository\OrderRepository;

use App\EventDispatchers\Listeners\DemoListener;
use App\EventDispatchers\Events\DemoEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
/**
 * @Route("/customer")
 */
class CustomerController extends AbstractController
{
    /**
     * @Route("/", name="customer_index", methods={"GET|POST"})
     */
    public function index(CustomerRepository $customerRepository, CustomerStatusRepository $customerStatusRepository, Request $request, EventDispatcherInterface $dispatcher, LoggerInterface $logger, DemoListener $listener): Response {


        // register listener for the 'demo.event' event
        //$listener = new DemoListener($logger);
        $dispatcher->addListener('demo.event', array($listener, 'onDemoEvent'));

        // dispatch
        $dispatcher->dispatch( new DemoEvent(), DemoEvent::NAME);


        $customers = [];
        
        $criteria = $request->get('searchForm', []);

        // just setup a fresh $task object (remove the example data)
        $customer = new Customer();

        $customer->setName("mahen");

        $form = $this->createForm(CustomerType::class, $customer);
        
        $customers = $customerRepository->findCustomerByCriteria($criteria);
        
        $customerStatusList = $customerStatusRepository->findAll();
        
        $totalCustomer = $customerRepository->count([]);
        
        return $this->render('customer/index.html.twig', [
            'form' => $form->createView(),
            'customers' => $customers,
            'customerStatusList'=>$customerStatusList,
            'searchForm'=>$criteria,
            'totalCustomer'=>$totalCustomer
        ]);
    }

    /**
     * @Route("/dummy-data", name="customer_dummy_data", methods={"GET","POST"})
     */
    public function dummyData(CustomerRepository $customerRepository, OrderRepository $orderRepository, CustomerStatusRepository $customerStatusRepository): Response {
        $totalCustomer = $customerRepository->count([]);
        if(!empty($totalCustomer)) {
            return $this->redirectToRoute('customer_index');
        }
        
        $customerStatusRepository->addDummyData();
        $customerRepository->addDummyData($customerStatusRepository);
        $orderRepository->addDummyData();
        
        return $this->redirectToRoute('customer_index');
    }
}
