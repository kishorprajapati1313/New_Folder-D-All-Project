using UnityEngine;

public class Moue_Controll : MonoBehaviour
{
    public float sensitivity = 0.8f;

    private float rotationY = 0.0f; // Only Y-axis rotation is needed

    void Awake()
    {
        Cursor.lockState = CursorLockMode.Locked;
        Cursor.visible = false;
    }

    void Update()
    {
        
            rotationY += Input.GetAxis("Mouse X") * sensitivity;
            transform.localRotation = Quaternion.Euler(0, rotationY, 0); // Adjust only the Y-axis rotation
        
    }
}
