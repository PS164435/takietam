// trafienie do kosza otwiera drzwi 2
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class KoszCollider : MonoBehaviour
{
    public GameObject door;
    public Vector3 targetPosition = new Vector3(10.12f, 0.09f, 0f);
    public float speed = 2f;

    private bool isMoving = false;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Switch"))
        {
            isMoving = true;
        }
    }

    private void Update()
    {
        if (isMoving)
        {
            door.transform.position = Vector3.MoveTowards(door.transform.position, targetPosition, speed * Time.deltaTime);
            if (door.transform.position == targetPosition)
            {
                isMoving = false;
            }
        }
    }
}

