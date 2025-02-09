using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class joistick : MonoBehaviour
{
    public float forwardsp = 25f, strafsp = 7.5f, hoversp = 5f;
    private float actforwardsp, actstrafsp, acthoversp;
    private float forwardacc = 2.5f, strafacc = 2f, hoveracc = 2f;

    public float lookratesp = 90f;
    private Vector2 lookinput, screencenter, mousedistance;

    private float rollinput;
    public float rollsp = 90f, rollac = 3.5f;

    public Transform aimTarget; // Reference to the aim target

    
    //joystickcontroller:-
    public VariableJoystick varjoy;

    private float horinput, verinput;


    // Start is called before the first frame update
    void Start()
    {
        screencenter.x = Screen.width * .5f;
        screencenter.y = Screen.height * .5f;

        Cursor.lockState = CursorLockMode.Confined;
    }

    // Update is called once per frame
    void Update()
    {
        horinput = varjoy.Horizontal;
        verinput = varjoy.Vertical;


        lookinput.x = Input.mousePosition.x;
        lookinput.y = Input.mousePosition.y;

        mousedistance.x = (lookinput.x - screencenter.x) / screencenter.y;
        mousedistance.y = (lookinput.y - screencenter.y) / screencenter.y;

        mousedistance = Vector2.ClampMagnitude(mousedistance, 1f);

        rollinput = Mathf.Lerp(rollinput, Input.GetAxisRaw("Roll"), rollac * Time.deltaTime);

        transform.Rotate(-mousedistance.y * lookratesp * Time.deltaTime, mousedistance.x * lookratesp * Time.deltaTime, rollinput * rollsp * Time.deltaTime, Space.Self);


        // actforwardsp = Mathf.Lerp(actforwardsp, Input.GetAxisRaw("Vertical") * forwardsp, forwardacc * Time.deltaTime);
        // actstrafsp = Mathf.Lerp(actstrafsp, Input.GetAxisRaw("Horizontal") * strafsp, strafacc * Time.deltaTime);

         actforwardsp = Mathf.Lerp(actforwardsp, verinput * forwardsp, forwardacc * Time.deltaTime);
        actstrafsp = Mathf.Lerp(actstrafsp, horinput * strafsp, strafacc * Time.deltaTime);

        acthoversp = Mathf.Lerp(acthoversp, Input.GetAxisRaw("Hover") * hoversp, hoveracc * Time.deltaTime);

        transform.position += transform.forward * actforwardsp * Time.deltaTime;
        transform.position += (transform.right * actstrafsp * Time.deltaTime) + (transform.up * acthoversp * Time.deltaTime);
    }
}
