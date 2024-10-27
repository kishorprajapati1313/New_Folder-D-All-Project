using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Player_controll : MonoBehaviour
{
    [Header("Audio")]
    public AudioSource src;
    public AudioClip jumpsrc, runsrc;

    [Header("Player Input States")]
    public Rigidbody rb;
    public float speed = 4f;
    public float jumpforce = 4f;
    private bool isground = false;

    public float looksp = 10f;
    public Vector2 look;

    private bool isMoving = false; // Added variable to track player movement

    private void Start()
    {
        rb = GetComponent<Rigidbody>();
        src = GetComponent<AudioSource>();
        Cursor.lockState = CursorLockMode.Confined;
    }

    private void Update()
    {
        // Input of cursor pointer
        look.x += Input.GetAxis("Mouse X");
        look.y += Input.GetAxis("Mouse Y");
        look.y = Mathf.Clamp(look.y, -90f, 90f);

        transform.localRotation = Quaternion.Euler(-look.y * looksp, look.x * looksp, 0);

        // Input of keys
        float hor = Input.GetAxis("Horizontal");
        float ver = Input.GetAxis("Vertical");

        // Movement of player of horizontal and vertical
        Vector3 movements = new Vector3(hor, 0f, ver);

        Vector3 movement = transform.TransformDirection(movements);

        rb.velocity = new Vector3(speed * movement.x, rb.velocity.y, speed * movement.z);

        // Check if the player is moving
        isMoving = Mathf.Abs(hor) > 0.1f || Mathf.Abs(ver) > 0.1f;

        // Section of Jump
        if (Input.GetKey(KeyCode.Space) && isground)
        {
            Jump();
        }

        // Play running audio if the player is moving
        if (isMoving && !src.isPlaying)
        {
            src.clip = runsrc;
            src.pitch = 1f;
            src.volume = 4;
            src.Play();
        }
        // Stop running audio if the player is not moving
        else if (!isMoving && src.clip == runsrc && src.isPlaying)
        {
            src.Stop();
        }
    }

    // Function of controlling the jump
    public void Jump()
    {
        src.clip = jumpsrc;
        src.pitch = 1.2f;
        src.volume = 1;
        src.Play();

        rb.AddForce(Vector3.up * jumpforce, ForceMode.Impulse);
        isground = false;
    }

    // Check if the player is on the ground or not
    private void OnCollisionEnter(Collision collision)
    {
        if (collision.gameObject.CompareTag("Ground"))
        {
            isground = true;
        }
    }
}
