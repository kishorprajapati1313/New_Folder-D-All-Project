using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Next_Dilog : MonoBehaviour
{
    int index = 2;

    // Update is called once per frame
    void Update()
    {
        if (Input.GetKey(KeyCode.N) && Player_control.dialog)
        {
            if (transform.childCount > index)
            {
                transform.GetChild(index).gameObject.SetActive(true);
                index++;
            }
            else
            {
                gameObject.SetActive(false);
            }
        }
    }
}
