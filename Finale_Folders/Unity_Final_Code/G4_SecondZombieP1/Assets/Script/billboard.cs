using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class billboard : MonoBehaviour
{
    public Transform cam;

    void LateUpdate()
    {
        if (cam != null)
        {
             // Face the camera using LookAt
            transform.LookAt(transform.position + cam.forward, cam.up);
        }
    }
}
