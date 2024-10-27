
def sorting(array):
    n = len(array)

    for i in range(n):
        for j in range(0, n-i-1):
            print("This Is J:", j)
            if array[j] > array[j+1]:
                array[j],array[j+1] = array[j+1], array[j]
    return array

array = [54,80,99,1000,1]
srted = sorting(array)
print("Sorted array" , srted)


def quick_sort(arr):
    # Base case: if the array is empty or has one element, it's already sorted
    if len(arr) <= 1:
        return arr
    else:
        # Choose a pivot element from the array (for simplicity, we choose the last element)
        pivot = arr[-1]
        # Create three sub-arrays
        left = [x for x in arr[:-1] if x <= pivot]  # elements less than or equal to pivot
        right = [x for x in arr[:-1] if x > pivot]  # elements greater than pivot

        # Recursively apply quick sort to the left and right sub-arrays
        return quick_sort(left) + [pivot] + quick_sort(right)


# Example usage
arr = [54,80,99,1000,1]
sorted_arr = quick_sort(arr)
print("Sorted array is:", sorted_arr)
