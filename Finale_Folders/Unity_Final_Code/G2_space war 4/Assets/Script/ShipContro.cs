using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using FishNet.Object;

public class ShipContro : NetworkBehaviour
{
    public float forwardsp = 25f, strafsp = 7.5f, hoversp = 5f;
    private float actforwardsp, actstrafsp, acthoversp;
    private float forwardacc = 2.5f, strafacc = 2f, hoveracc = 2f;

    public float lookratesp = 90f;
    private Vector2 lookinput, screencenter, mousedistance;

    private float rollinput;
    public float rollsp = 90f, rollac = 3.5f;

    public Transform aimTarget; // Reference to the aim target

    private CharacterController con;

    private void Start() {
        screencenter.x = Screen.width * .5f;
        screencenter.y = Screen.height * .5f;

        Cursor.lockState = CursorLockMode.Confined;
        con = GetComponent<CharacterController>();
        
    }

    private void Awake()
    {
        con = GetComponent<CharacterController>();
    }

    // Update is called once per frame
    private void Update()
    {
        if(!base.IsOwner) 
        return;

        // Look Input
        lookinput.x = Input.mousePosition.x;
        lookinput.y = Input.mousePosition.y;

        mousedistance.x = (lookinput.x - screencenter.x) / screencenter.y;
        mousedistance.y = (lookinput.y - screencenter.y) / screencenter.y;

        mousedistance = Vector2.ClampMagnitude(mousedistance, 1f);

        // Roll Input
        rollinput = Mathf.Lerp(rollinput, Input.GetAxisRaw("Roll"), rollac * Time.deltaTime);

        transform.Rotate(-mousedistance.y * lookratesp * Time.deltaTime, mousedistance.x * lookratesp * Time.deltaTime, rollinput * rollsp * Time.deltaTime, Space.Self);

        // Movement Input
        float verticalInput = Input.GetAxisRaw("Vertical");
        float horizontalInput = Input.GetAxisRaw("Horizontal");
        float hoverInput = Input.GetAxisRaw("Hover");

        // Calculate actual speeds with acceleration
        actforwardsp = Mathf.Lerp(actforwardsp, verticalInput * forwardsp, forwardacc * Time.deltaTime);
        actstrafsp = Mathf.Lerp(actstrafsp, horizontalInput * strafsp, strafacc * Time.deltaTime);
        acthoversp = Mathf.Lerp(acthoversp, hoverInput * hoversp, hoveracc * Time.deltaTime);

        // Apply movement
        Vector3 moveDirection = transform.forward * actforwardsp + transform.right * actstrafsp + transform.up * acthoversp;
        Vector3 move = moveDirection * Time.deltaTime;


        con.Move(move);
    }
}
