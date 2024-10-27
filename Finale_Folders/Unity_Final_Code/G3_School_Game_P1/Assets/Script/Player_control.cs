using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Player_control : MonoBehaviour
{
    [Header("Moving")]
    [SerializeField] public float movingSpeed = 2f;
    [SerializeField] public float sidemoving = 1f;
    [SerializeField] public float takeoffSpeed = 1f;
    [SerializeField] public float takeoffForwardSpeed = 0.1f;
    [SerializeField] public float rotationSpeed = 10f;
    [SerializeField] public bool isfly = false;
    [SerializeField] public bool ismoving = false;

    private Animator anim;
    public bool still = true;
    
    [SerializeField]private bool isGround = false; // Declare isGround as a class-level variable

    [SerializeField] public Quaternion orignalrotation;

    [SerializeField] public Vector3 targetPosition;
    private Rigidbody rb;

    static public bool dialog = false;

        
    private void ResetRotation()
    {
        // Reset the rotation to 0,0,0
        transform.rotation = Quaternion.Euler(0, 0, 0);
    }


    private void Start()
    {
        anim = GetComponent<Animator>();
        rb = GetComponent<Rigidbody>();
        targetPosition = transform.position;
        orignalrotation = transform.rotation;
    }

    
    private void Update()
    {
        if (Input.GetKey(KeyCode.W) && Input.GetKey(KeyCode.LeftShift) && isGround){
            moveonlyforward();
        }
        else if(Input.GetKey(KeyCode.W))
        {
            TakeOff();
        }
        else if (Input.GetKey(KeyCode.S))
        {
            Landing();
        }
        else if (Input.GetKey(KeyCode.D) && !isGround)
        {
            rightTurn();
        }
        else if (Input.GetKey(KeyCode.A) && !isGround)
        {
            leftTurn();
        }
        else
        {
            
            anim.SetBool("isfly", false);
            anim.SetBool("ismoving", false);
           
            isfly = false;
            rb.isKinematic = false;
            targetPosition = transform.position;
            ResetRotation();
        }
        
    }

    private void TakeOff()
    {
        anim.SetBool("isfly", true);
        rb.isKinematic = true;
        targetPosition += transform.forward * movingSpeed * Time.deltaTime;
        targetPosition.y += takeoffSpeed * Time.deltaTime;
        transform.position = Vector3.Lerp(transform.position, targetPosition, 0.1f);
        isfly = true;

        if (Input.GetKey(KeyCode.D) )
        {
            rightTurn();
        }
        else if (Input.GetKey(KeyCode.A) )
        {
            leftTurn();
        }
    }

    private void moveonlyforward () {
        transform.position += transform.forward * movingSpeed * Time.deltaTime;
    }

    private void Landing()
    {
        
        if(!isGround){
             rb.isKinematic = false;
            transform.position += transform.forward * movingSpeed * Time.deltaTime;
            anim.SetBool("isfly", true);
        }else{
             //noting happend
        }
    }

    private void rightTurn()
    {
        anim.SetBool("ismoving", true);
        rb.isKinematic = true;

        float rotationAmount = sidemoving * -rotationSpeed * Time.deltaTime;
        Quaternion orignalrotation = Quaternion.Euler(0, 0, rotationAmount); // Create a rotation quaternion
        transform.rotation *= orignalrotation; // Apply the rotation

        targetPosition += transform.right * sidemoving * Time.deltaTime;
        targetPosition.y += takeoffForwardSpeed * Time.deltaTime;
        transform.position = Vector3.Lerp(transform.position, targetPosition, 0.1f);
    }


    private void leftTurn()
    {
        anim.SetBool("ismoving", true);
        rb.isKinematic = true;

        float rotationAmount = sidemoving * rotationSpeed * Time.deltaTime;
        Quaternion orignalrotation = Quaternion.Euler(0, 0, rotationAmount); // Create a rotation quaternion
        transform.rotation *= orignalrotation; // Apply the rotation

        targetPosition += transform.right * -sidemoving * Time.deltaTime;
        targetPosition.y += takeoffForwardSpeed * Time.deltaTime;
        transform.position = Vector3.Lerp(transform.position, targetPosition, 0.1f);
    }

    private void OnCollisionEnter(Collision collision)
    {
        if (collision.gameObject.CompareTag("isGround"))
        {
            isGround = true;
        }
    }

      private void OnCollisionExit(Collision collision)
    {
        if (collision.gameObject.CompareTag("isGround"))
        {
            isGround = false;
        }
    }
}